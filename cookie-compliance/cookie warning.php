Put this in the <head> and make sure the urls to the script and css are correct...

<!--
    =====================================
    COOKIE WARNING CODE REFERENCES
    =====================================
    -->
		<script type="text/javascript" src="cookie-compliance-wp.js"></script>
		<link type="text/css" href="stylesheet.css" rel="stylesheet">
    <!--
    END
    =====================================
    -->



Put this just inside the container div (ie. just after this... <div id="container">)

<!--
    =====================================
    COOKIE WARNING MESSAGE
    =====================================
    -->
		<div id="cookieMessageWrapper">
			<div id="cookieMessage">
				<a id="cookieClose" href="#"></a>
				<p><strong>This site uses cookies.</strong> You can read how we use them in our <a href="#">privacy policy</a>.</p>
			</div>
		</div>
    <!--
    END
    =====================================
    -->


Also ensure the url to the close button image is correct in the CSS file.


Kind Regards
Pete