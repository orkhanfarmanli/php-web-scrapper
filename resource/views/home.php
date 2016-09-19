<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Web Scrapper</title>
    <link rel="stylesheet" href="resource/bootstrap/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <a href="/web-scrapper"><h3 class="text-center">Web Scrapper</h3></a>
        <div class="row">
            <h4>Push the button and wait few seconds for the scrapped data to be loaded into database. You'll get an alert when it finishes</h4>
            <button type="button" name="button" class="loadButton btn btn-primary">Load All Data</button>
        </div>
        <div class="row">
            <br>
            <h4>After loading the data you can search them from your own database</h4>
            <form id="searchForm" action="/web-scrapper/" method="POST">
                <div class="row">
                    <div class="form-group col-md-2">
                        <select name='searchParameter' class="form-control">
                          <option value="name">Name</option>
                          <option value="born">Born</option>
                          <option value="occupation">Work</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input class="form-control" placeholder="Search for..." name="searchWord">
                            <span class="input-group-btn">
                              <input class="btn btn-default" type="submit" value="Find" name="submit"></input>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="resource/scripts/jquery-3.1.0.min.js"></script>
<script src="resource/scripts/main.js"></script>
</html>
