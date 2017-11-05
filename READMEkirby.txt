I've spent quite a few hours formatting the user interface views.  I took a queue from Chuck who mentioned that he liked seeing pictures of his food and I've put small pictures into the views without taking up too much real estate.

The views are centered and are pretty narrow (I'm not sure how narrow is narrow enough though).

All of my changes are in menu.php.  There are so many changes that annotating them all with a comment is not feasible.  Part of that is because I've indented the code in the first 2/3 of the file so that I could follow it better.

I tested things and am pretty confident that I haven't broken anything with these changes. 

I hope each of you hasn't done too much to menu.php in the last 2 days and can add what you've done to this file.

I added a php function near the top of the file called dm which takes in a number and returns a string with 2 decimal places for printing prices. I used it in the views that show prices, but I haven't tackled the cart yet.

Still to do:

1.  I added the CSS styling block for the TYPE=NUMBER near the top of the file.  It's finicky with different browsers, but works good with Safari.  It probably needs more work to work with your PC browsers.

2. I didn't touch the cart yet.  I'll wait until you look at this and give me your critique.

3. The "SUBS" view has too much line spacing and it's caused by the "Choose" button.  I can't get it to do single-line spacing, maybe one of you can.  Or maybe we change to a different style of button. I also wanted to rearrange the "Hot Subs", ,"Cold Subs" and "All Subs" buttons to be in one horizontal line, but they refuse to be moved around.

4. The "PIZZA" view and the "CALZONE" view both need to show pricing for the pizza and the toppings, but I haven't figured out how to do that.  Should the price be put into the SIZE dropdown?

5. The "STROMBOLI" view and the "SALADS" view really don't need the checkboxes in addition to the QTY, but I don't feel comfortable removing them since it affects other code.
