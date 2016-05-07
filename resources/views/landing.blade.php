@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<!-- Carousel -->
<div id="my-carousel" class="carousel slide" data-ride="carousel" style="margin-top: -20px;">
    <ol class="carousel-indicators">
        <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#my-carousel" data-slide-to="1"></li>
        <li data-target="#my-carousel" data-slide-to="2"></li>
        <li data-target="#my-carousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="/images/pic1.jpg" class="img-responsive carousel-image" alt="...">
            <div class="carousel-caption">
                <h3>Celebrate that special occasion with a beautiful themed cake.</h3>
            </div>
        </div>
        <div class="item">
            <img src="/images/pic2.jpg" class="img-responsive carousel-image" alt="...">
            <div class="carousel-caption">
                <h3>Made from the highest quality ingredients to create unique flavors that are light and delicate</h3>
            </div>
        </div>
        <div class="item">
            <img src="/images/pic3.jpg" class="img-responsive carousel-image" alt="...">
            <div class="carousel-caption">
                <h3>A delicacy that will melt in your mouth. Made from a yeast dough, rich in buter with fruits</h3>
            </div>
        </div>
        <div class="item">
            <img src="/images/pic4.jpg" class="img-responsive carousel-image" alt="...">
            <div class="carousel-caption">
                <h3>Beautiful, memorable and delicious cakes. Let us help make your dream cake a reality</h3>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

<!-- thumbs section -->
<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-md-3">
            <div class="centered-heading"><h4>CATEGORIES</h4></div>
            <div class="category-block shadow1">
                <a href=""><h5>BIRTHDAY CAKES</h5></a>
                <a href=""><h5>WEDDING CAKES</h5></a>
                <a href=""><h5>ALL OCCASSIONS CAKES</h5></a>
                <a href=""><h5>SPECIALTY AND FUN CAKES</h5></a>
                <a href=""><h5>CUSTOM CAKES</h5></a>
                <a href=""><h5>CUP CAKES</h5></a>
                <a href=""><h5>SPONGE CAKES</h5></a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row centered-heading"><h4>FEATURED CAKES</h4></div>
            <center>
                @foreach($cakes as $cake)
                <div class="col-md-4 featured shadow1">
                    <img src="{{ $cake->image_url }}" class="img-responsive photo" border="0" />
                    <div class="featured-footer">
                        <div class="row centered-heading"><h4>&#8358; {{ $cake->price }}</h4></div>
                        {{ $cake->name }}<br />
                        <div class="form-container" style="padding:0px; margin:5px;">
                            <form method="link" action="/product/{{ $cake->id }}">
                                <button type="submit" class="btn btn-default">Order Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </center>
        </div>
    </div>
</div>

<!-- write upd section -->
<div class="container" style="margin-top:40px; margin-bottom:50px;">
    <div class="row">
        <div class="col-sm-5">
            <img src="images/cake.jpg" class="img-circle img-responsive" />
        </div>
        <div class="col-sm-7">
            <h3>Welcome to Cake Deal</h3>
            <p>Our range of traditional celebration cakes are the perfect finishing touch to your special occasion. Make yours unique by selecting your base, size, colour, sides and message</p>

            <h3>Custom Orders</h3>
            <p>All of products are available for custom ordering for any occasion. From engagement parties and baby showers to kid's birthday cakes and anniversaries of all kinds, get the right combination of wonderful pastries, cakes and desserts to make your celebration memorable!</p>

            <h3>Birthdays</h3>
            <p>One of our favorite deliights is to help you get a custom designed birthday cake or dessert bar menu for celebrants. Our unique home-made birthday cakes all start with a private, consultation and tasting. Bring up to four folks along with all your ideas, pictures, color swatches or sketches. Our professionals will help you design your birthday cakes to fit your personalities, your themed birthday and your budget. Available for delivery throughout Nigeria.</p>

            <h3>Nationwide Distribution, Lowest Cost</h3>
            <p>Our centralized location gives us the ability to control labor costs, and allows us to distribute to our customers nationwide at the lowest cost possible. Another plus at our location? We have 65 acres of land on which we can expand.</p>
        </div>
    </div>
</div>

@endsection
