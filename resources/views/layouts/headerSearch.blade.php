<div class="container">
    <form class="search-box pb-45">
        <div class="row align-items-end">

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
                {{-- <div class="select-form mb-15"> --}}
                <div class="date-pic mb-15">
                    <label>Adult*</label>
                    {{-- <select id="select1" name="adult">
                        <option value="">No of Adult</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>

                    </select> --}}
                    <div class="boking-datepicker">

                        <a class="btn  mx-5" onclick="incrementAdult()">+</a>
                        <input id=select1 name="adult" class="form-control mt-2 mx-4" style="width:120px" value="{{ (int)session('adult') ?? 0  }}"type=number min=0 max=20>
                        <a class="btn mt-2  mx-5" onclick="decrementAdult()">-</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                {{-- <div class="select-form mb-15">
                    <select id="select2" name="child">
                        <option value="">No of Children</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="1">1</option>

                    </select>
                </div> --}}
                {{-- {{dd((int)session('adult'))}} --}}
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
        </div>

        </form>

</div>

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

    function required() {

        var fromDate = $('#datepicker1').val();
        var toDate = $('#datepicker2').val();
        var adult = $('#select1').val();
        var child = $('#select2').val();
        var error = 0;


        console.log(fromDate);


        if (fromDate == " ") {

            alert('Please select From Date');
            error++
        } else if (toDate == " ") {

            alert('Please select End Date');

            error++
        } else if (adult == "") {

            alert('Please select No of Adult');

            error++
        } else if (child == "") {
            alert('Please select No of Child');
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
