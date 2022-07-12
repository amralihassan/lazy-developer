@extends('bakerysoft-dashboard')
@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="{{ asset('images/logo.jpg') }}" alt="" width="72"
                    height="57">
                <h2>Generate CRUD</h2>
                {{-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form
                    group has a validation state that can be triggered by attempting to submit the form without completing
                    it.</p> --}}
            </div>
            <form action="{{ url('/bakery-soft/generate') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Controller namespace</strong></label>
                            <input type="text" name="controller_namespace" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Model namespace</strong></label>
                            <input type="text" name="model_namespace" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Model name</strong></label>
                            <input type="text" name="model_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>View path</strong></label>
                            <input type="text" name="view_path" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label><strong>Route group [ prefix ]</strong></label>
                            <input type="text" name="route_group_prefix" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label><strong>Route group [ namespace ]</strong></label>
                            <input type="text" name="route_group_namespace" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label><strong>Route path</strong></label>
                            <input type="text" name="route_path" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>What type do you want to generate?</strong></label><br>
                            <input type="checkbox" name="route_wep" value="1" checked disabled> Web <br>
                            <input type="checkbox" name="route_api" value="1"> Api
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label><strong>Run migration after generate?</strong></label><br>
                            <input type="checkbox" checked name="run_migration" value="1"> Yes
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label><strong>Default migration</strong></label><br>
                            <input type="checkbox" checked name="default_migration" value="1"> Yes
                        </div>
                    </div>
                </div>
                <label><strong>Fields (Draggable)*</strong></label>
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div id="inputFormRow">
                            <div class="input-group mb-3">
                                <input type="text" required name="field_name[]" class="form-control m-input"
                                    placeholder="Field name ex: first_name" autocomplete="off">
                                <select name="datatype[]" required class="form-control m-input">
                                    <option value="">Select DataType</option>
                                    <option value="bigIncrements">bigIncrements</option>
                                    <option value="unsignedBigInteger">unsignedBigInteger</option>
                                    <option value="string">string</option>
                                    <option value="text">text</option>
                                    <option value="enum">enum</option>
                                    <option value="boolean">boolean</option>
                                    <option value="date">date</option>
                                    <option value="time">time</option>
                                    <option value="integer">integer</option>
                                    <option value="tinyInteger">tinyInteger</option>
                                    <option value="smallInteger">smallInteger</option>
                                    <option value="mediumInteger">mediumInteger</option>
                                    <option value="bigInteger">bigInteger</option>
                                    <option value="mediumText">mediumText</option>
                                    <option value="timestamps">timestamps</option>
                                    <option value="longText">longText</option>
                                    <option value="nullableTimestamps">nullableTimestamps</option>
                                    <option value="softDeletes">softDeletes</option>
                                    <option value="dateTime">dateTime</option>
                                    <option value="char">char</option>
                                    <option value="decimal">decimal</option>
                                    <option value="double">double</option>
                                    <option value="float">float</option>
                                    <option value="increments">increments</option>

                                </select>
                                <select name="nullable[]" class="form-control m-input">
                                    <option value="no">Nullable (no)</option>
                                    <option value="yes">Nullable (yes)</option>
                                </select>
                                <input type="text" name="default_value[]" class="form-control m-input"
                                    placeholder="Default value ex:Mohamed" autocomplete="off">

                                <div class="input-group-append">
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>

                            </div>
                            <div class="form-group enum" style = "display:none">
                                <div class="row">
                                    <div class="col-md-2"><input type="text" name="enum_value0[]value1[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value0[]value2[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value0[]value3[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value0[]value4[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value0[]value5[]" class="form-control">
                                    </div>
                                    <div class="col-md-2"><input type="text" name="enum_value0[]value6[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">Relation</div>
                                    <div class="col-md-6">Validation</div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info">Add Field</button>
                    </div>
                </div>
                <input type="submit" value="Generate" name="submit" class="btn btn-block btn-primary">
            </form>
            <hr>

        </main>
    </div>
@endsection
