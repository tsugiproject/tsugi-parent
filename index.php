<html>
<head>
<title>Tsugi Store Parent Site</title>
<style>
body { 
    background: url(images/bgbg.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 10px;
    font-family: "Source Sans Pro","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #EEEEEE;
}
</style>
<body>
<a href="https://github.com/tsugiproject/tsugi-parent" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0; height:120px; width:120px;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png" alt="Fork me on GitHub"></a>
<h1>Tsugi Store Parent Site</h1>
<p> In general, a Tsugi store and apps will be at the <code>/tsugi</code>
path, leaving the root path
to be a web site where the store owner can put up any site they like with documentation,
instructions, etc.  The Tsugi parent site can use any technology but the two most
common approaches are static HTML possibly mixed in with PHP.
</p>
<p>  You can see this in action by comparing 
<a href="https://www.tsugicloud.org" target="_blank">https://www.tsugicloud.org</a>
(a static html site)
with
<a href="https://www.tsugicloud.org/tsugi" target="_blank">https://www.tsugicloud.org/tsugi</a>
(a tsugi store).
</p>
<p>
One strategy is just put a page in that does not even link to Tsugi at all.  Simply introduce
the user to how your local app store is used.   As an example you could install your Tsugi store
into your LMS using Content-Item / Deep-Linking for everyone and this page is
merely documentation.  You could even make the top page a single redirect to a
completely different web page and host this parent site using any technology you like.
</p>
<h2>Links into Tsugi</h2>
<p>
If you want this to be a site (like TsugiCloud) that allows login, and encourages
folks to login and apply for keys, or look at the cool tools on your site,
you will need to embed various links into Tsugi in the parent web site.
<ul>
<li><p><a href="/tsugi">/tsugi</a> Will link to the top page in Tsugi.</p></li>
<li><p><a href="/tsugi/admin">/tsugi/store</a> Will link to app store in Tsugi.</p></li>
<li><p><a href="/tsugi/admin">/tsugi/admin</a> Will link to the admin page in Tsugi.</p></li>
<li><p><a href="/tsugi/login">/tsugi/login</a> Will link to the Tsugi login page (assuming Google login is setup).</p></li>
<li><p><a href="/tsugi/login">/tsugi/logout</a> Will log the user out.</p></li>
</ul>
These pages will have a links at the top and the left most navigation should link back to this
page.  This is set in the <code>tsugi/config.php</code> file.
<pre>
$CFG-&gt;servicename = 'MyStore';
$CFG-&gt;apphome = 'https://www.mystore.edu';
</pre>
You can see this in action on
<a href="https://www.tsugicloud.org/tsugi/store/" target="_blank">tsugicloud.org</a> - the 
text and destination of the upper left link go back to the parent site.  The <code>apphome</code>
value does not have to be on the same web server as <code>/tsugi</code>.
</p>
<h2>Making a Koseu Site</h2>
<p>
With some work, you can turn this parent site into a standalone LMS using Koseu.
Koseu is a Tsugi-based LMS/MOOC platform that is used to build the content and site for:
<ul>
<li><p><a href="https://www.py4e.com/" target="_blank">Python For Everybody</a></p></li>
<li><p><a href="https://www.openochem.org/" target="_blank">Open Organic Chemistry</a></p></li>
<li><p><a href="https://www.wd4e.com/" target="_blank">Web Design For Everybody</a></p></li>
<li><p><a href="https://www.wa4e.com/" target="_blank">Web Applications For Everybody</a></p></li>
</ul>
Please join the <a href="https://www.tsugi.org/" target="_new">Tsugi Developers List</a> if you
are interested in building a Koseu site.
</p>
</body>
</html>