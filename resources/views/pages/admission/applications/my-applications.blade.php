@extends('layouts.app')
@section('page-name', 'My Applications')
@section('admin-main')
    <link id="myskin" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/skins/skin-master.css">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">
    <script src="https://admissions.uoel.edu.pk/admin_asset/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $(function() {
                $('.select2').select2();

            });
        });
    </script>
    <style>
        .table {
            zoom: 0.85;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Applied Programs
                    </h2>
                </div>
                <div class="card-body show">
                    <div class="panel-content">
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th> Program Level</th>
                                    <th> Program </th>
                                    <th> Merit</th>
                                    <th> Quota </th>
                                    <th>Challan</th>
                                    <th> Print Form</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($application as $a)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $a->programLevel->name }}</td>
                                        <td>
                                            {{ $a->program->name }}
                                        </td>
                                        <td>
                                            {{ $a->merit }}
                                        </td>
                                        <td>
                                            Open Merit

                                        </td>

                                        <td>
                                            <a href="#" target="_blank" class="btn btn-xs btn-primary"><i
                                                    class="fa fa-print"></i>

                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{ route('admission.checkout.create') }}"
                                                class="btn btn-xs btn-primary"><i class="fa fa-credit-card"></i>

                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
