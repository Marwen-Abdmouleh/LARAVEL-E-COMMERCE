<div class="header-grid">
    <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
        <ul>
            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                <a href="http://www.Gmail.com" target="_blank" >
                    @example.com</a></li>
            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
            <li>
              
                <form action="{{ route('logout')}}" method="POST">
            <i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>
               <input type="submit" value="logout" >
                @csrf
            </form>
        </li>
        </ul>
    </div>
    <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
        <ul class="social-icons">
            <li><a href="http://www.Facebook.com" target="_blank" class="facebook"></a></li>
            <li><a href="#" class="twitter"></a></li>
            <li><a href="#" class="g"></a></li>
            <li><a href="#" class="instagram"></a></li>
            <li><a href="#" class="github"></a></li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>