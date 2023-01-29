<div class="container">
    <form  class="search-box pb-45">
        <div class="row align-items-end">

            {{-- {{ dd(session()->all())}} --}}
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                <div class="date-pic mb-15">
                    <label>Check In Date*</label>
                    <div class="boking-datepicker">
                        <input id="datepicker1"name="fromDate" value="{{ session('fromDate') ?? '' }} "
                            placeholder="Check in" required />
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                <div class="date-pic mb-15">
                    <label>Check Out Date*</label>
                    <div class="boking-datepicker">
                        <input id="datepicker2" name="toDate" value="{{ session('toDate') ?? '' }} "
                            placeholder="Check out" required />
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                <div class="select-form mb-15">
                    <select id="select1" name="adult">
                        <option value="">No of Adult</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>

                    </select>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                <div class="select-form mb-15">
                    <select id="select2" name="child">
                        <option value="">No of Children</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="1">1</option>

                    </select>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                <div class="search-form">
                    <a type="submit" class="btn btn-primary" onclick="required()" href="#"> Search </a>
                
                    @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                    @endif
                </div>
            </div>
        </div>
    {{-- </form> --}}
</div>

<script>
    function required() {


        // var empt = document.getElementById("select1").value;
        // console.log(empt);
        // if (empt == "") {
        //     alert("Please input a Value");
        //     return false;
        // } else {
        //     alert('Code has accepted : you can try another');
        //     return true;
        // }




        var fromDate = $('#datepicker1').val();
        var toDate = $('#datepicker2').val();
        var adult = $('#select1').val();
        var child = $('#select2').val();
        var error = 0;
        if(fromDate == ""){

            alert('Please select From Date');
            error++
        }else if(toDate ==""){
            alert('Please select End Date');
            
            error++
        }else if(adult ==""){

            alert('Please select No of Adult');
            
            error++
        }else if(child == ""){
            alert('Please select No of Child');
            error++

        }
        
        if(error == 0){

        
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
