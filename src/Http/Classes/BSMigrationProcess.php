<?php

namespace BakerySoft\LaravelBakerySoft\Http\Classes;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class BSMigrationProcess
{
    public $modelName;
    public $fieldName;
    public $datatype;
    public $nullable;
    public $defaultValue;
    public $enumValues;
    public $defaultMigration;
    public $migrationCreateStub;

    function __construct($data)
    {
        $this->modelName =  ucfirst($data['modelName']);
        $this->fieldName = $data['field_name'];
        $this->datatype = $data['datatype'];
        $this->nullable = $data['nullable'];
        $this->defaultValue = $data['default_value'];
        $this->defaultMigration = $data['defaultMigration'];

        $this->loadMigrationCreateStub();
    }

    public function createFields()
    {
        $fields = $this->defaultMigration ? '$table->id();' . "\n" : '';

        for ($i = 0; $i < count($this->fieldName); $i++) {
            // set the fields is nullable if exist
            $nullable = ($this->nullable[$i] == 'yes') ? '->nullable()' : '';

            // use default value if exist
            $defaultValue = !empty($this->defaultValue[$i]) ? '->default(' . $this->returnDefaultValue($i) . ')' : '';

            $fields .= "\t" . "\t" . "\t" . '$table->' . $this->datatype[$i] . '(' . $this->fieldName($i) . ')' . $nullable . $defaultValue . ';' . "\n";
            // create relation with the table in case datatype unsignedBigInteger
            $fields .= $this->createRelationTable($i);
        }

        $fields .= $this->defaultMigration ? "\t" . "\t" . "\t" . '$table->timestamps();' : '';

        return $fields;
    }

    private function createRelationTable($i)
    {
        if ($this->datatype[$i] == 'unsignedBigInteger')
            return "\t" . "\t" . "\t" . '$table->foreign("' . strtolower($this->fieldName[$i]) . '")->references("id")->on("' .
                $this->getRelationTableName($i) . '")->cascadeOnDelete();' . "\n";
    }

    private function getRelationTableName($i)
    {
        return $this->str_plural(str_replace('_id', '', $this->fieldName[$i]));
    }

    private function fieldName($i)
    {
        // in case datatype is enum
        if ($this->datatype[$i] == 'enum') {
            $this->enumValues = request('enum_value' . $i);

            // remove all nullable values
            $enumValues = array_filter($this->enumValues);

            // add single quotes for string values
            for ($x = 0; $x < count($enumValues); $x++) {
                $values[] = "'" . $enumValues[$x] . "'";
            }

            // convert array to string
            $values = implode(', ', $values);

            return  "'" . trim($this->fieldName[$i]) . "'" . ',[' . $values . ']';
        }

        return "'" . trim($this->fieldName[$i]) . "'";
    }

    private function returnDefaultValue($i)
    {
        // add single quotes for string values
        if (in_array($this->datatype[$i], $this->stringDataTypes())) {
            return "'" . trim($this->defaultValue[$i]) . "'";
        }

        return trim($this->defaultValue[$i]);
    }

    private function stringDataTypes()
    {
        return ['string', 'text', 'mediumText', 'longText', 'char', 'enum'];
    }

    public function createMigrationFile()
    {
        $path = $this->base_path('database/migrations/') . $this->generateFileName();
        touch($path);
        return $path;
    }

    public function replaceClass()
    {
        $this->migrationCreateStub = str_replace(
            '{{ class }}',
            $this->generateClassName(),
            $this->migrationCreateStub
        );
        return $this;
    }

    private function generateClassName()
    {
        return 'Create' . $this->str_plural($this->modelName) . 'Table';
    }

    private function generateFileName()
    {
        return date('Y') . '_' . date('m') . '_' . date('d') . '_' . time() . '_create_' . $this->str_plural(strtolower($this->modelName)) . '_table.php';
    }

    public function replaceTable()
    {
        $this->migrationCreateStub = str_replace(
            '{{ table }}',
            $this->str_plural(strtolower($this->modelName)),
            $this->migrationCreateStub
        );
        return $this;
    }

    public function replaceFields()
    {
        $this->migrationCreateStub = str_replace(
            '{{ fields }}',
            $this->createFields(),
            $this->migrationCreateStub
        );
        return $this;
    }

    private function loadMigrationCreateStub()
    {
        $this->migrationCreateStub = $this->getMigrationCreateStubContent();
    }

    private function getMigrationCreateStubContent()
    {
        // save the content into variable
        return File::get($this->base_path('BackerySoft/BSMigrate-create.stub'));
    }

    private function base_path($path = '')
    {
        return app()->basePath($path);
    }

    private function str_plural($value, $count = 2)
    {
        return Str::plural($value, $count);
    }

    public function migrate()
    {
        Artisan::call('migrate');
    }
}
