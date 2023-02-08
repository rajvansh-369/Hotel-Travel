@extends('layouts.app')
@section('content')


<div class="header-top navBar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <div class="header-info-left">
                        {{-- <ul>
                            <li>Call Us: +10 (89) 675 5456</li>
                            <li>

                                <a href="">enquiry@hotel.com</a>
                                
                            </li>
                        </ul> --}}
                    </div>
                    <div class="header-info-right d-none d-sm-block">
                        {{-- <ul class="header-social">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
    </style>
<div class="oontainer-fluid container_form-bar">
    <div class="form_full sign_up">
        <div class="col-md-12 text-center">
            <h2>Billing</h2>
        </div>
    </div>

{{-- {{dd($user, $booked, $hotel)}} --}}
    
    <!--Billing strat -->
    <div class="card billing_form " id="section-to-print">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: hsl(213, 15%, 56%);font-size: 20px;">Invoice >> <strong>ID: #123-123</strong></p>
                    </div>
                    <div class="col-xl-3 float-end mb-2">
                        <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark" onclick="window.print()"><i
                                class="fas fa-print text-primary"></i> Print</a>
                        
                        
                                <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                class="far fa-file-pdf text-danger"></i> Export</a>
                    </div>
                    <hr>
                </div>

                <div class="container">

                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$user->name}}</span></li>
                                <li class="text-muted">Street, City</li>
                                <li class="text-muted">State, Country</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> {{$user->email}}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">ID:</span>#123-456</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Creation Date: </span>{{ $invoiceDate}}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="me-1 fw-bold">Status:</span><span
                                        class="badge bg-warning text-black fw-bold">
                                        Unpaid</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#5479bd ;" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Description</th>
                                    {{-- <th scope="col">Rooms</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{  \Carbon\Carbon::createFromFormat('Y-m-d', $booked->start)->format('M d, Y') }}</td>
                                    <td>{{  \Carbon\Carbon::createFromFormat('Y-m-d', $booked->end)->format('M d, Y') }}</td>
                                    <td class="desc">{!! html_entity_decode($booked->body, ENT_QUOTES, 'UTF-8') !!} </td>
                                    {{-- <td>₹800</td> --}}
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <p class="ms-3">Add additional notes and payment information</p>

                        </div>
                        <div class="col-xl-3">
                            <ul class="list-unstyled">
                                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal :</span> <span class="float-end"> ₹{{$hotel->price_per_day * $totalTime}} </span></li>
                                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">  Discount {{$hotel->full_discount_rate}}%:</span>  <span class="float-end price_card"> - ₹{{number_format($discountPrice , 2)}} </span>  </li>
                                <li class="text-muted ms-3 mt-2"><span class="text-black me-4"> TAX {{$hotel->sale_tax}}% :</span>   <span class="float-end"> + ₹{{number_format($sale_tax , 2)}} </span>  </li>
                     {{-- <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Commission Fees (10%) </span>₹111</li> --}}
                            </ul>
                            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                                    style="font-size: 25px;">₹{{ number_format($totalPrice,2)}}</span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Thank you for your booking</p>
                        </div>
                        <div class="col-xl-12">
                            <button type="button" class="btn btn-primary text-capitalize">Proceed</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Biling end  -->

</div>

@endsection