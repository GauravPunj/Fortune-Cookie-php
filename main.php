<!DOCTYPE html>
<?php
/**
* This is my original work and shall not be used without my prior permission
* This PHP class consists of variables which taken input from the inputform.html as per values given by user.
* There is a fortune cookie class with a constructor and a random method for the 7 lucky number generation
*  Fortune cookie display messages are stored in an array. A For Loop is placed which creates different objects
* fortune cookies with count equal to as input by the user. This loop creates and displays these cookies with the randomly
* generated lucky numbers in the range specified by the user and in the color specified by the user.
 */ 
$name = filter_input(INPUT_GET, "name", FILTER_SANITIZE_SPECIAL_CHARS);
$cookiescount = filter_input(INPUT_GET, "cookiescount", FILTER_VALIDATE_INT);
$cookiescolor = filter_input(INPUT_GET, "cookiescolor", FILTER_SANITIZE_STRING);
$minrange= filter_input(INPUT_GET,"minrange",FILTER_VALIDATE_INT);
$maxrange = filter_input(INPUT_GET,"maxrange",FILTER_VALIDATE_INT);

/**
 * Below is an array named messagesarray which consists of 50 fortune cookie messages . In the final display these will show
 * When the user hovers over the cookies. Each message will be selected at random for each message displayed.
 */
$messagesarray = ["Today it's up to you to create the peacefulness you long for","A friend asks only for your time not your money",
"If you refuse to accept anything but the best, you very often get it","A smile is your passport into the hearts of others",
"A good way to keep healthy is to eat more Chinese food","Your high-minded principles spell success",
"Hard work pays off in the future, laziness pays off now","Change can hurt, but it leads a path to something better",
"Enjoy the good luck a companion brings you","People are naturally attracted to you",
"Hidden in a valley beside an open stream- This will be the type of place where you will find your dream",
"A chance meeting opens new doors to success and friendship","You learn from your mistakes You will learn a lot today",
"If you have something good in your life, don't let it go!What ever you're goal is in life, embrace it visualize it, and for it will be yours",
"Your shoes will make you happy today","You cannot love life until you live the life you love",
"Be on the lookout for coming events; They cast their shadows beforehand","Land is always on the mind of a flying bird",
"The man or woman you desire feels the same about you","Meeting adversity well is the source of your strength",
"A dream you have will come true","Our deeds determine us, as much as we determine our deeds","Never give up",
" You're not a failure if you don't give up","You will become great if you believe in yourself",
"There is no greater pleasure than seeing your loved ones prosper","You will marry your lover",
"A very attractive person has a message for you","You already know the answer to the questions lingering inside your head",
"It is now, and in this world, that we must live","You must try, or hate yourself for not trying",
"You can make your own happiness","The greatest risk is not taking one",
"The love of your life is stepping into your planet this summer",
"Love can last a lifetime, if you want it to",
"Adversity is the parent of virtue","Serious trouble will bypass you",
"A short stranger will soon enter your life with blessings to share",
"Now is the time to try something new","Wealth awaits you very soon",
"If you feel you are right, stand firmly by your convictions",
"If winter comes, can spring be far behind?Keep your eye out for someone special",
"You are very talented in many ways","A stranger, is a friend you have not spoken to yet",
"A new voyage will fill your life with untold memories","You will travel to many exotic places in your lifetime",
"Your ability for accomplishment will follow with success","Nothing astonishes men so much as common sense and plain dealing",
"Its amazing how much good you can do if you dont care who gets the credit"
]
?>
<html>

<head>
    <meta charset='UTF-8'>
    <title>Hello Client</title>
    <style>

        
        body{  width: 4in;
                border-style: solid;
                border-width: 5px;
                background-color:orange;
                font-family: "Times New Roman", sans-serif;
                font-style: italic;
                font-weight: bold;
                font-size: 18pt;
		}
        
        .circle{
            height: 225px;
            width: 255px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }
        .number{
            margin-top:70px;
            position:absolute;
            margin-left: 20px;

        }
/**the div id named number is styled here which makes the lucky number and fortunecookie message hidden and only displayed after hovered on by the user */
        .number p{
            visibility: hidden;
        }
        

        .number:hover p{
            visibility: visible;
        }
        
    </style>
</head>

<body>
<?php
/**
 * fortunecookie named class is created which would be called to create objects of type fortunecookie
 */
    class fortunecookie{
        private $minrange;
        private $maxrange;
        private $name;
        private $cookiecount;
        private $cookiecolor;

        public function _construct($minrange,$maxrange){
            $this->minrange = $minrange;
            $this->maxrange = $maxrange;
        }
/**The function named random generates 7 random numbers in the range from minimum to maximum as input by the user */
        public function random($minrange,$maxrange){
            for($i=0;$i<7;$i++){
            $rand = rand($minrange,$maxrange);
            echo $rand." ";}
        }

    }
    /**Below displays the name as input by the user */
    echo "<p>welcome $name!</p>";
    /**The below loop creates the fortunecookies by calling the method with count upto the cookiecount as input by the user */
    for($i = 0;$i<$cookiescount;$i++){
    $p1 = new fortunecookie($minrange,$maxrange);
    echo "<div class= number><p> Lucky number is: <br>";
    echo $p1->random($minrange,$maxrange); 
    echo "<br>".$messagesarray[rand(0,49)]."</p></div>";
    echo "<div class= circle style='background-color: $cookiescolor' ></div><br>";}

?>
</body>

</html>