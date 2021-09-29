@extends('layouts.app')
@push('styles')
    <style>
        table td{
            text-overflow: ellipsis;
            overflow: hidden;
            /* white-space: nowrap; */
        }
        .form-check{
            margin-bottom:0px;
        }
        .form-check .form-check-label{
            bottom:15px;
            
        }
        form button{
            cursor: pointer;
        }
        .odds{
            background:#0000000d
        }
    </style>
@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{route('currency.store.rates')}}"  enctype="multipart/form-data"> @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="">Base Currency</label>
                                                <select name="base" class="form-control" required>
                                                    @foreach ($currencies as $currency)
                                                        <option value="{{$currency->id}}">{{$currency->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <small class="form-text text-muted">Name of Currency</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="">Target Currency</label>
                                                <select name="target" class="form-control" required>
                                                    @foreach ($currencies as $currency)
                                                        <option value="{{$currency->id}}">{{$currency->name}}</option>
                                                    @endforeach
                                                </select>
                                                <small class="form-text text-muted">Name of Currency</small>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block " type="submit" style="cursor:pointer">
                                                    Save Currency
                                                </button>
                                            </div>
                                              
                                        </div>
                                        
                                    </div>
                                    
                                </fieldset> 
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card data-tables strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Currency Rates</h4>
                            <p class="card-category">Here is a sub name for this table</p>
                        </div>
                        <div class="card-body table-full-width table-responsive dataTable dtr-inline">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                
                            </div>
                            <table id="datatables" class="table table-hover " cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>
                                        <a href="#" class="btn btn-danger btn-outline btn-sm" rel="tooltip" title="Delete all selected" data-placement="bottom" >
                                        <span class="btn-label">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                        
                                        </a>
                                    </th>
                                    <th>Base</th> 
                                    <th>Target</th>
                                    <th>Amount</th>
                
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($rates as $rate)
                                        <tr>
                                            <td>
                                                <div class="form-check checkbox-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                        <span class="form-check-sign"></span> 
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{$rate->base_currency->symbol}}   
                                            </td>
                                            <td>
                                                {{$rate->target_currency->symbol}}  
                                            </td>
                                            
                                            <td>
                                                {{$rate->amount}}
                                                
                                            </td>
                                            <td class="d-block">
                                                <div class="">
                                                    <a href="{{route('currency.edit',$rate->base_currency)}}" rel="tooltip" title="edit item" data-placement="left" class="btn btn-info btn-outline btn-sm rounded">
                                                        <span class="btn-label">
                                                            <i class="fa fa-pencil"></i>
                                                        </span>  
                                                    </a>
                                                    {{-- <br> --}}
                                                    <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#delete-item{{$rate->base}}" class="btn btn-danger btn-outline btn-sm rounded" rel="tooltip" title="delete item" data-placement="left">
                                                        <span class="btn-label">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                    </a>
                                                    <div class="modal fade modal-mini modal-primary" id="delete-item{{$rate->base}}" tabindex="-1" role="dialog" aria-labelledby="delete-item{{$rate->base}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <p>Delete item</p>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>Are you sure you want to delete this item</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form class="d-inline" action="{{route('currency.destroy',$rate->base_currency)}}" method="POST">@csrf
                                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                                    </form>
                                                                    <button type="button" class="btn btn-link btn-simple" style="cursor:pointer" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>    
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
    </div>
@endsection
@push('scripts')
<script src="{{asset('backend/js/plugins/bootstrap-table.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script>
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthtag": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        // sortable: true,
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });

</script>
@endpush

          