@extends('layouts.app')
@section('page-name', 'Grade Book Details')
@section('admin-main')
    <style>
        .table {
            zoom: 0.8;
        }
    </style>

    <link id="myskin" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/skins/skin-master.css">
    <div class="row">
        @if (!$fee->isEmpty())
            <div class="col-xl-12">
                <div id="panel-12" class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            Fee History
                        </h2>
                    </div>
                    <div class="card-body show">

                        <table class="table table-bordered table-hover m-0">
                            <thead class="thead-themed">
                                <tr>
                                    <th>Sr#</th>
                                    <th>Challan #</th>
                                    <th>Challan Type</th>
                                    <th>Amount to Pay</th>
                                    <th>Due Date</th>
                                    <th>Fine Amount</th>
                                    <th>Fine Date</th>
                                    <th>Amount Paid</th>
                                    <th>Payment Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fee as $i => $f)
                                    <tr>
                                        <th scope="row">{{ $i + 1 }}</th>
                                        <td>{{ $f->challan_no }}</td>
                                        <td>
                                            @if ($f->fee_type == 1)
                                                {{ 'Admission Processing' }}
                                            @else
                                                {{ 'Semester Fee' }}
                                            @endif
                                        </td>
                                        <td>{{ $f->amount_to_pay }}</td>
                                        <td>{{ $f->due_date }}</td>
                                        <td>{{ $f->fine_amount }}</td>
                                        <td>{{ $f->fine_date }}</td>
                                        <td> {{ $f->amount_paid }} </td>
                                        <td> {{ $f->updated_at }} </td>

                                        <td>
                                            @if ($f->status == 1)
                                                {{ 'Paid' }}
                                            @else
                                                {{ 'UnPaid' }}
                                            @endif
                                        </td>
                                        <td><a href="#" target="_blank"><span class="fa fa-print"></span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
