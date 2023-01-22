<div>
    <div class="container">
        <div class="row">
            <div class="form-outline mb-3">
                <input wire:keydown="search" wire:model="searchText" type="search" id="form1" class="form-control" placeholder="Search Your Hotels" aria-label="Search" />
              </div>
            @foreach ($hotels as $hotel)
                {{-- {{dd($hotel->picture->where('picture_type' , 'main_picture')->first())}} --}}
                <div class="col-lg-6">
                    <a target="_blank" href="{{ route('hotel-details', $hotel->id) }}">
                        <div class="single-location single-location2 mb-30 line-content">
                            <img class="hotel_mainImg"
                                src="{{ asset('/storage/' . $hotel->picture[0]->picture) }}" alt="">

                            <div class="location-contents">
                                <h3><a href="#">{{ $hotel->name }} </a></h3>
                                <p>2 Adult 1 Children</p>
                                <div class="price">
                                    <span>Started from<span>₹{{ $hotel->price_per_day }}</span></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <ul id="pagin">
                {{-- <li class="prev" style="display: none;">Prev</li>

                <li><a href="#topScroll" class="current">1</a></li>
                <li><a href="#topScroll">2</a></li>
                <li><a href="#topScroll">3</a></li>
                <li><a href="#topScroll">4</a></li>
                <li><a href="#topScroll">5</a></li>
                <li><a href="#topScroll">6</a></li>
                <li><a href="#topScroll">7</a></li>
                <li><a href="#topScroll">8</a></li>
                <li><a href="#topScroll">9</a></li>
                <li><a href="#topScroll">10</a></li>
                <li class="next">Next</li> --}}
            </ul>



        </div>
    </div>
    <style>
        .next{
            display: none;
        }
        </style>

    @if(count($hotels) > 2)
    <script>
        $(document).ready(function () {

            // alert("test");
            pageSize = 6;
            incremSlide = 5;
            startPage = 0;
            numberPage = 0;
    
            var pageCount =  $(".line-content").length / pageSize;
            var totalSlidepPage = Math.floor(pageCount / incremSlide);
                
            for(var i = 0 ; i<pageCount;i++){
                $("#pagin").append('<li><a href="#topScroll">'+(i+1)+'</a></li> ');
                if(i>pageSize){
                $("#pagin li").eq(i).hide();
                }
            }
    
            var prev = $("<li/>").addClass("prev").html("Prev").click(function(){
            startPage-=5;
            incremSlide-=5;
            numberPage--;
            slide();
            });
    
            prev.hide();
    
            var next = $("<li/>").addClass("next").html("Next").click(function(){
            startPage+=5;
            incremSlide+=5;
            numberPage++;
            slide();
            });
    
            $("#pagin").prepend(prev).append(next);
    
            $("#pagin li").first().find("a").addClass("current");
    
            slide = function(sens){
            $("#pagin li").hide();
            
            for(t=startPage;t<incremSlide;t++){
                $("#pagin li").eq(t+1).show();
            }
            if(startPage == 0){
                next.show();
                prev.hide();
            }else if(numberPage == totalSlidepPage ){
                next.hide();
                prev.show();
            }else{
                next.show();
                prev.show();
            } 
            
                
            }
    
            showPage = function(page) {
                $(".line-content").hide();
                $(".line-content").each(function(n) {
                    if (n >= pageSize * (page - 1) && n < pageSize * page)
                        $(this).show();
                });        
            }
                
            showPage(1);
            $("#pagin li a").eq(0).addClass("current");
    
            $("#pagin li a").click(function() {
                $("#pagin li a").removeClass("current");
                $(this).addClass("current");
                showPage(parseInt($(this).text()));
            });
    
          
    });
    </script>

    @endif

</div>
