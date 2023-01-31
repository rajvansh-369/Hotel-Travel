<div>
    <div class="card text-dark bg-light mb-3 availability" style="max-width: 20rem;">
        <div class="card-header">Avilbility</div>
        <div class="card-body ">


           
                @csrf

                <div class="row justify-content-between hr" id="hr1">
                    <div class="col-md-8 col-sm-8">
                        <p class="pricehrdy"><strong>Full Day Start Time :</strong></p>

                    </div>

                    <div class="col-md-4 col-sm-4">
                        <p>{{ $hotel->full_day_start_time }}</p>
                    </div>
                </div>
                <div class="row justify-content-between hr" id="hr1">
                    <div class="col-md-8 col-sm-8">
                        <p class="pricehrdy"><strong>Full Day End Time :</strong></p>

                    </div>

                    <div class="col-md-4 col-sm-4">
                        <p>{{ $hotel->full_day_end_time }}</p>
                    </div>
                </div>

                {{-- {{dd($hotel)}} --}}

                {{-- <section class="availability-card"> --}}
                <div class="row justify-content-between hr" id="hr1">
                    <div class="col-md-8 col-sm-8">
                        <p class="pricehrdy">
                            <strong>₹{{ $hotel->price_per_day }}</strong><span>/day</span>
                        </p>

                    </div>
                    @if ($hotel->full_discount_rate != 0)
                        <div class="col-md-4 col-sm-4">
                            <p class="dicnt">
                                <strong>{{ $hotel->full_discount_rate }}</strong>%<br>Discount
                            </p>
                        </div>
                    @endif
                </div>


                {{-- <h5 class="card-title">Price per Day : <b>₹{{ $hotel->price_per_day }}</b></h5> --}}

                <form wire:submit.prevent="priceCalc">

                  
                <div class="row justify-content-between hr" id="hr1">

                    <select id="select" onchange="bedroomPriceFunc()"  >
                        {{-- <option value="">Select Bedroom Type</option> --}}

                        @forelse ($hotel->bedrooms as $bedroom)
                            <option wire:key="bedroom-{{ $bedroom->id }}" value="{{ $bedroom->bedroom_price }}">
                                {{ $bedroom->bedroom_name }}</option>

                        @empty
                        @endforelse


                    </select>
                    <div class="hidden_price">
                        <input type="text" id="price"  wire:model.defer="BedroomPrice" value="">

                    </div>

                </div>

                {{-- <div class="date-pic mb-15"> --}}
                    <label for="#">Check In Date*</label>
                    {{-- <div class="boking-datepicker "> --}}
                        <input id="datepicker1"  required wire:model="startDate" wire:model.defer="startDate" value="{{ session('fromDate') ?? '' }} " placeholder="Check in"  class="text-secondary datePicker" />
                        @if (auth()->user())
                            <input type="" wire:model.defer="userID" value="{{ auth()->user()->id }}">
                            <input type="" wire:model.defer="hotelId" value="{{ $hotel->id }}">
                        @endif
                    {{-- </div> --}}

                {{-- </div> --}}
                <div class="date-pic mb-15">
                    <label for="#">Check Out Date*</label>
                    <div class="boking-datepicker">
                        <input id="datepicker2" required wire:model.defer="endtDate"
                            value="{{ session('toDate') ?? '' }} " placeholder="Check out"
                            class="text-secondary datePicker" />
                    </div>
                </div>

                @if (auth()->user())
                    <button type="submit"
                        class="btn btn-primary  d-flex justify-content-center">CHECK
                        AVAILABILITY</button>
                @else
                    <a class="btn btn-primary  d-flex justify-content-center" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">CHECK
                        AVAILABILITY</a>
                @endif

            </form>
        </div>
    </div>

    <script>



        
        function bedroomPriceFunc(){

                    //   $('.hidden_price').html('');

                    var bedroomTypePrice = $('.list .selected').data('value');
                    // $('.hidden_price').append('<input type="text" wire:model.defer="BedroomPrice" value='+bedroomTypePrice+'>')

                    $('#price').val(bedroomTypePrice);
             
             
                }
    
    
    </script>
</div>
