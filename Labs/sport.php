<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports form</title>
    <h1>Sport Club Feed Back Form</h1>
</head>
<body>
    <p><b>Please fill out this form to let us know what you think of the club so that we can improve it</b></p>
    <form>
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname">
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    

        <p><b>Which sports do you enjoy the most?:</b></p>

        <input type="checkbox" id="option1" name="swimming" value="swim">
        <label for="vehicle1"> Swimming</label>
        <input type="checkbox" id="option2" name="football" value="football">
        <label for="vehicle2"> Football</label>
        <input type="checkbox" id="option3" name="tennis" value="tennis">
        <label for="vehicle3"> Tennis</label><br><br>
        <input type="checkbox" id="option4" name="snooker" value="snooker">
        <label for="vehicle2"> Snooker</label>
        <input type="checkbox" id="option5" name="golf" value="golf">
        <label for="vehicle3"> Golf</label><br>

        <p><b>How long have you been a member of the club?</b></p>

        <input type="radio" id="radio1" name="membershipLength" value="lessThan1">
        <label for="1year">Less than one year</label>
        <input type="radio" id="radio2" name="membershipLength" value="oneToTwo">
        <label for="2years">One to two years</label>
        <input type="radio" id="radio3" name="membershipLength" value="moreThanTwo">
        <label for="3years">More than two years</label>

        <p><b>Please give us any addtional feedback that you may have</b></p>

        <label for="comments">Comments:</label>

        <textarea id="comment1" name="comment" rows="4" cols="50">
        </textarea>
        <br>
        <br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">

    </form>

    
    
</body>
</html>