<div class="timer">
    <div class="container">
        <div class="timer-grids">
            <div class="col-md-8 timer-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                <h3><a href="products.html">sunt in culpa qui officia deserunt mollit</a></h3>
                <div class="rating">
                    <div class="rating-left">
                        <img src="{{asset('images/2.png')}}" alt=" " class="img-responsive" />
                    </div>
                    <div class="rating-left">
                        <img src="{{asset('images/2.png')}}" alt=" " class="img-responsive" />
                    </div>
                    <div class="rating-left">
                        <img src="{{asset('images/2.png')}}" alt=" " class="img-responsive" />
                    </div>
                    <div class="rating-left">
                        <img src="{{asset('images/2.png')}}" alt=" " class="img-responsive" />
                    </div>
                    <div class="rating-left">
                        <img src="{{asset('images/1.png')}}" alt=" " class="img-responsive" />
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="new-collections-grid1-left simpleCart_shelfItem timer-grid-left-price">
                    <p><i>$580</i> <span class="item_price">$550</span></p>
                    <h4>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                        nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit 
                        qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui 
                        dolorem eum fugiat quo voluptas nulla pariatur.</h4>
                    <p><a class="item_add timer_add" href="#">add to cart </a></p>
                </div>
                <div id="counter"> </div>
                <script src="{{asset('js/jquery.countdown.js')}}"></script>
                <script src="{{asset('js/script.js')}}"></script>
            </div>
            <div class="col-md-4 timer-grid-right animated wow slideInRight" data-wow-delay=".5s">
                <div class="timer-grid-right1">
                    <img src="{{asset('images/17.jpg')}}" alt=" " class="img-responsive" />
                    <div class="timer-grid-right-pos">
                        <h4>Special Offer</h4>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<div class="collections-bottom">
    <div class="container">
        <div class="collections-bottom-grids">
            <div class="collections-bottom-grid animated wow slideInLeft" data-wow-delay=".5s">
                <h3>45% Offer For <span>Women & Children's</span></h3>
            </div>
        </div>
    @include('layouts.front.newsletter')
    </div>
</div>