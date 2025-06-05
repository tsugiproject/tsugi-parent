<html>
<head>
<title>Tsugi Parent Site</title>
<style>
body {
    background: url(images/bgbg.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 20px;
    font-family: "Source Sans Pro","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 16px;
    line-height: 1.42857143;
    color: #EEEEEE;
}
a {
    color: #A4DEEE;
    text-decoration: none;
}
</style>
<body>
<a href="https://github.com/tsugiproject/tsugi-parent" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0; height:120px; width:120px;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png" alt="Fork me on GitHub"></a>
<h1>Tsugi Parent Site</h1>
<p> In general, a Tsugi store and apps will be installed at the <code>/tsugi</code>
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
<li><p><a href="tsugi">tsugi</a> Will link to the top page in Tsugi.</p></li>
<li><p><a href="tsugi/store">tsugi/store</a> Will link to app store in Tsugi.</p></li>
<li><p><a href="tsugi/admin">tsugi/admin</a> Will link to the admin page in Tsugi.
You may decide not to expose this link to end users and just share it with your administrators.
</p></li>
<li><p><a href="tsugi/login">tsugi/login</a> Will link to the Tsugi login page (assuming Google login is setup).</p></li>
<li><p><a href="tsugi/logout">tsugi/logout</a> Will log the user out.</p></li>
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
<p>
When you first go to the <code>/tsugi</code> page, you will not see an "Admin" link.  The link
is hidden by default until you manually navigate to <a href="tsugi/admin">tsugi/admin</a>
and enter the login password successfully.  At that point, Tsugi sets a cookie and your browser
starts seeing the "Admin" link.   This is to keep from showing 99.9% of your users an Admin link
they cannot use on every screen.  Is the Tsugi site is in "DEVELOPER" mode
(for developers on their desktop), the Admin link appears all the time.
</p>
<h2>Making a Koseu Site</h2>
<p>
With some work, you can turn this parent site into a standalone LMS using Koseu.
Koseu is a Tsugi-based LMS/MOOC platform that is used to build the content and site for:
<ul>
<li><p><a href="https://www.py4e.com/" target="_blank">Python For Everybody</a></p></li>
<li><p><a href="https://www.dj4e.com/" target="_blank">Django For Everybody</a></p></li>
<li><p><a href="https://www.wd4e.com/" target="_blank">Web Design For Everybody</a></p></li>
<li><p><a href="https://openochem.org/" target="_blank">Open Organic Chemistry</a></p></li>
<li><p><a href="https://www.wa4e.com/" target="_blank">Web Applications For Everybody</a></p></li>
</ul>
Please join the <a href="https://www.tsugi.org/" target="_new">Tsugi Developers List</a> if you
are interested in building a Koseu site.
</p>
<h2>Hosting Tsugi</h2>
<p>
Instructions for hosting your own Tsugi server are available at:
<ul>
<li><p><a href="https://github.com/tsugiproject/tsugi-build" target="_blank">Tsugi Hosting Instructions</a></p></li>
</ul>
</p><p>
<p>
You can use Tsugi tools for free at:
<ul>
<li><p><a href="https://www.tsugicloud.org/" target="_blank">TsugiCloud</a></p></li>
</ul>
</p><p>
You can get commercial support for Tsugi at
<ul>
<li><p><a href="https://www.learnxp.com/" target="_blank">Learning Experiences</a></p></li>
</ul>
</p><p>

</body>
</html>
