<script type="text/javascript">
$(document).ready(function() {


    var tables = $('#contentTable table').get();
    var peopleArray = [];


    var a = 0;
    for (var j = 1; j <= tables.length; j++) {
        var rowCount = $('#contentTable table:nth-child(' + j + ') tr').length;
        for (var i = 2; i <= rowCount; i++) {
            peopleArray[a] = {};
            peopleArray[a].name = $('#contentTable table:nth-child(' + j + ') tbody tr:nth-child(' + i + ') td:nth-child(1) a').html();
            peopleArray[a].occupation = $('#contentTable table:nth-child(' + j + ') tbody tr:nth-child(' + i + ') td:nth-child(2) font font').html();
            peopleArray[a].born = $('#contentTable table:nth-child(' + j + ') tbody tr:nth-child(' + i + ') td:nth-child(3) font tt').html();
            peopleArray[a].died = $('#contentTable table:nth-child(' + j + ') tbody tr:nth-child(' + i + ') td:nth-child(4) font tt').html();
            peopleArray[a].summary = $('#contentTable table:nth-child(' + j + ') tbody tr:nth-child(' + i + ') td:nth-child(5) font font').html();
            a+=1;
        }
    }

    var params = {
        peopleArray: peopleArray
    };
    var paramJSON = JSON.stringify(params);

        $('.loadButton').click(function() {
            $.post(
                'index.php', {
                    data: paramJSON
                },
                function(data) {
                    alert("Loaded data into database")
                })
        })

})

</script>
