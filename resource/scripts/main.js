$(document).ready(function() {


    var childLength = $('tbody tr').length;
    var peopleArray = [];


    for (var i = 2; i <= childLength - 1; i++) {
        peopleArray[i] = {};
        peopleArray[i].name = $('tbody tr:nth-child(' + i + ') td:nth-child(1) a').html();
        peopleArray[i].occupation = $('tbody tr:nth-child(' + i + ') td:nth-child(2) font font').html();
        peopleArray[i].born = $('tbody tr:nth-child(' + i + ') td:nth-child(3) font tt').html();
        peopleArray[i].died = $('tbody tr:nth-child(' + i + ') td:nth-child(4) font tt').html();
        peopleArray[i].summary = $('tbody tr:nth-child(' + i + ') td:nth-child(5) font font').html();
    }
    var $loadbutton = document.createElement("button");



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
