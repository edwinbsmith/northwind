<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Purchase North Wind | Author Michael Hale</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="top-bar">
    <div class="top-bar-right">
        <ul class="menu" data-smooth-scroll>
            <li><a href="#the-book">The Book</a></li>
            <li><a href="#the-author">The Author</a></li>
            <li class="menu-purchase-link"><a href="#purchase">Purchase</a></li>
        </ul>
    </div>
</div>
<section class="banner-hero">
    <img class="hero-image" src="images/banner.jpg" alt="">
    <div class="burst-container">
        <div id="burst"></div>
        <div class="burst-content">
            <a href="#purchase">Available<br>for Purchase<br>Now!</a>
        </div>
    </div>
</section>
<section id="endorsement">
    <div class="grid-x align-center">
        <div class="cell medium-8">
            <p class="text-center">Four men, away on a Canadian wilderness fishing trip, dropped off on a remote lake miles from civilization suddenly face the unimaginable. How will they survive? Who will they encounter? What will they face when they return...<br><em>if they return?</em></p>
            <hr>
            <blockquote>
                “A <span>fresh new voice</span> in thriller fiction, Michael Hale’s <em>North Wind</em> is ripped from today’s headlines, visceral and compelling. Hale is the real deal!”
                <cite>Steve Alten, New York Times best selling author of Meg and Undisclosed.</cite>
            </blockquote>
        </div>
    </div>
</section>
<section id="purchase">
    <div class="grid-x align-center align-middle">
        <div class="cell medium-4">
            <img src="images/mockup.png" alt="">
        </div>
        <div class="cell medium-6">
            <form action="/purchase" method="post" data-abide data-validate-on="fieldChange">
                {{ csrf_field() }}
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <div data-abide-error class="alert callout" style="display: none;">
                            <p><i class="fi-alert"></i> There are some errors in your form.</p>
                        </div>
                    </div>
                    <div class="cell">
                        <h2>Purchase <strong>North Wind</strong></h2>
                    </div>
                    <div class="cell">
                        <label for="name">Enter your name
                            <input type="text" name="name" required>
                        </label>
                    </div>
                    <div class="cell">
                        <label for="address">Mailing address
                            <input type="text" name="address" required>
                        </label>
                    </div>
                    <div class="cell large-6">
                        <label for="city">City
                            <input type="text" name="city" required>
                        </label>
                    </div>
                    <div class="cell medium-6 large-2">
                        <label for="city">State
                            <input type="text" name="state" required>
                        </label>
                    </div>
                    <div class="cell medium-6 large-4">
                        <label for="zip">Zip code
                            <input type="text" name="zip" required>
                        </label>
                    </div>
                    <div class="cell">
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="<?php echo $stripe_key; ?>"
                                data-description="Purchase North Wind"
                                data-amount="1500"
                                data-locale="auto"></script>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section id="the-book">
    <div class="grid-x align-center">
        <div class="medium-8 cell">
            <h2>From the <strong>book</strong></h2>
            <p>The men scanned the clear star filled sky. An eerie silence had spread across the area, as if nature had pulled the covers up over her head for a long night’s sleep. The loons no longer yodeled, and the crickets had ceased their nightly chatter.</p>
            <p>“This is weird,” Brice said. “I can’t quite…”, he stopped short and looked at his feet.</p>
            <p>The ground had begun to vibrate, sending tingling sensations up their legs.</p>
            <p>“Holy shit,” William exclaimed. “Look at that!”</p>
            <p>High up in the atmosphere, hundreds of fireballs were streaking across the sky heading north and north east, each leaving an arcing tracer in its wake. As they watched the light show unfold it slowly formed a web like appearance as the beams intertwined. A high-pitched buzzing sound rang in their ears.</p>
            <p>“Since when do meteors make noise, unless they’re getting ready to crash into your house?” John asked curiously.</p>
            <p>Brice shook his head and declared loudly, “They’re not meteors!"</p>
        </div>
    </div>
</section>
<section id="the-author" class="about-the-author">
    <div class="grid-x grid-padding-x align-center">
        <div class="cell medium-6">
            <h2 class="author-title">About the <strong>Author</strong></h2>
            <h3 class="separator-left">Michael Hale</h3>
            <p>
                I am an avid fisherman and have taken yearly fly-in fishing trips into the Canadian wilderness since the mid seventies. The harsh reality is that while we are in the bush events occur in the world without our knowledge. In 1997, on the last day of our trip, the pilot told us of Princess Diana’s death as we loaded the plane. That triggered the question... ‘What if we were never picked up?’ From that day forward North Wind had begun its development.
            </p>
            <p>
                I turned sixty years old in 2017 and have been married to Sharon for 32 years. We have 4 wonderful children and 8 grandchildren with another on the way. This is my first novel and I am excited to share it with all of you! Six years of my life have gone into its publication, and I sincerely hope you enjoy every page. Thank you for taking part in my adventure.
            </p>
        </div>
        <div class="cell medium-4">
            <div class="author-image">
                <img src="images/headshot.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<div class="top-bar bottom-bar align-center">
    <ul class="menu">
        <li class="menu-text">Copyright Michael Hale 2018 &copy;</li>
    </ul>
</div>
@if (session('success'))
    <div class="reveal" id="success-modal" data-reveal>
        <h3>Your order is complete!</h3>
        <p>{{ session('success') }}</p>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        $(document).ready(function() {
            $('#success-modal').foundation('open');
        });
    </script>
@endif
@if (session('error'))
    <div class="reveal" id="error-modal" data-reveal>
        <h3>There was an error.</h3>
        <p>We're sorry, an error has occurred. Please email admin@authormichaelhale.com with the information below.</p>
        <p><small>{{ session('error') }}</small></p>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        $(document).ready(function() {
            $('#error-modal').foundation('open');
        });
    </script>
@endif
<script src="/js/app.js"></script>
</body>
</html>