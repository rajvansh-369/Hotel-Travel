{{-- <div class="container"> --}}
    <form class="search-box pb-45">
        {{-- <div class="row align-items-end">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                <div class="date-pic mb-15">
                    <label>Check In Date*</label>
                    <div class="boking-datepicker">
                        <input id="datepicker1"name="startDate" value="{{ session('startDate') ?? '' }} "
                            placeholder="Check in" required />
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                <div class="date-pic mb-15">
                    <label>Check Out Date*</label>
                    <div class="boking-datepicker">
                        <input id="datepicker2" name="endDate" value="{{ session('endDate') ?? '' }} "
                            placeholder="Check out" required />
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
               
                <div class="date-pic mb-15">
                    <label>Adult*</label>
    
                    <div class="boking-datepicker">

                        <a class="btn  mx-5" onclick="incrementAdult()">+</a>
                        <input id=select1 name="adult" class="form-control mt-2 mx-4" style="width:120px" value="{{ (int)session('adult') ?? 0  }}"type=number min=0 max=20>
                        <a class="btn mt-2  mx-5" onclick="decrementAdult()">-</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">

                <div class="date-pic mb-15">
                    <label>Child*</label>
                    <div class="boking-datepicker">

                        <a  class="btn mx-5" onclick="incrementChild()" >+</a>
                        <input  id=select2 class="form-control mt-2 mx-4 " name="child" style="width:120px" value="{{ (int)session('child') ?? 0  }}" type=number min=0 max=20>
                        <a class="btn  mx-5 mt-2" onclick="decrementChild()">-</a>
                    </div>
                </div>




            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                <div class="search-form">
                    <a type="submit" class="btn btn-primary" onclick="required()"> Search </a>

                    @if ($errors->any())
                        <h4>{{ $errors->first() }}</h4>
                    @endif
                </div>
            </div>
        </div> --}}
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">



        <div class="container"  id="booking-form">
            <div class="row d-flex justify-content-center searchBack">
{{-- 
                <div class="col-md-3 mx-2">

                    <label for="destination">Destination</label>
                    <input type="text" id="destination" name="destination" value="Bodhgaya" readonly placeholder="EG. HAWAII">
                </div> --}}

                <div class="col-md-3 form-date-from form-icon">
                    <label for="date_from">From</label>
                    <input type="text" id="datepicker1" class="date_from hasDatepicker" value="{{ session('startDate') ?? '' }} " placeholder="Pick a date">    
                    
                    </div>
                <div class="col-md-3 form-date-from form-icon">
                    <label for="date_from">To</label>
                    <input type="text" id="datepicker2" class="date_from hasDatepicker" value="{{ session('endDate') ?? '' }} " placeholder="Pick a date">
                    
                    </div>
                 
                    <div class="col-md-2 col-sm-4 mt-3 form-quantity">
                        <label for="quantity">Adults</label>
                        <input type="number"   name="quantity" id="select1" value="0" min="0" class="nput-text qty text">
                        <span class="modify-qty plus mx-2" onclick="incrementAdult()"><i class="fa-solid fa-angle-up"></i></span>
                        <span class="modify-qty minus mx-2" onclick="decrementAdult()"><i class="fa-solid fa-angle-down"></i></span>
                    </div>

                    <div class="col-md-2  col-sm-4 mt-3 form-quantity">
                        <label for="quantity">Children</label>
                        <input type="number"   name="quantity" id="select2" value="0" min="0" class="nput-text qty text">
                        <span class="modify-qty plus mx-2" onclick="incrementChild()"><i class="fa-solid fa-angle-up"></i></span>
                        <span class="modify-qty minus mx-2" onclick="decrementChild()"><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                    <div class="col-md-2  col-sm-4 mt-3 form-quantity">
                        <label for="quantity">Room</label>
                        <input type="number"    name="quantity" id="select3" value="0" min="0" class="nput-text qty text">
                        <span class="modify-qty plus mx-2" onclick="incrementRoom()"><i class="fa-solid fa-angle-up"></i></span>
                        <span class="modify-qty minus mx-2" onclick="decrementRoom()"><i class="fa-solid fa-angle-down"></i></span>
                    </div>
            </div>
            <div class="row d-flex justify-content-center searchBack">
                    <div class="col-md-2  mt-4">
                        <div class="search-form">
                            <a type="submit" class="btn btn-primary" onclick="required()"> Search </a>
        
                            @if ($errors->any())
                                <h4>{{ $errors->first() }}</h4>
                            @endif
                        </div>
                    </div>
                </div>
                </div>

        </div>

{{-- </div> --}}

<script>



    function incrementAdult() {
        document.getElementById('select1').stepUp();
        // document.getElementById('select2').stepUp();
    }

    function incrementChild() {
        // document.getElementById('select1').stepUp();
        document.getElementById('select2').stepUp();
    }

    function decrementAdult() {
        document.getElementById('select1').stepDown();
        // document.getElementById('select2').stepDown();
    }

    function decrementChild() {
        // document.getElementById('select1').stepDown();
        document.getElementById('select2').stepDown();
    }

    function incrementRoom() {
        // document.getElementById('select1').stepUp();
        document.getElementById('select3').stepUp();
    }

    function decrementRoom() {
        // document.getElementById('select1').stepDown();
        document.getElementById('select3').stepDown();
    }

    function required() {

        var fromDate = $('#datepicker1').val();
        var toDate = $('#datepicker2').val();
        var adult = $('#select1').val();
        var child = $('#select2').val();
        var room = $('#select3').val();
        var error = 0;


        // console.log(fromDate);


        if (fromDate == "") {

            alert('Please select From Date');
            error++
        } else if (toDate == "") {

            alert('Please select End Date');

            error++
        } else if (adult == 0) {

            alert('Please select atleat 1 adult');

            error++
        } else if (child == "") {
            alert('Please select No of Child');
            error++

        }else if(room == 0){
            alert('Select atleat 1 Room');
            error++
        }

        if (error == 0) {


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: @json(route('searchHotels')),
                type: 'post',
                data: {
                    'fromDate': fromDate,
                    'toDate': toDate,
                    'adult': adult,
                    'child': child,
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    window.location.href = @json(route('searchResult'));
                },
                error: function(request, error) {
                    console.log(request);
                    console.log(error);
                    alert("Request: " + JSON.stringify(request));
                }
            });
        }
    }
</script>
