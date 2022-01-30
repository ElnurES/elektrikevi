//search fetching
$('#search').on('keyup', function (e) {
    e.preventDefault();
    e.stopPropagation();

    $('.search_dropdown ul').empty();

    if ($(this).val().length < 3) {
        return false;
    }
    let data = {
        'text': $(this).val(),
        '_token': $("meta[name='csrf-token']").attr('content'),
    };

    fetch('/search', {
        method: "post",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            let res = data.data;
            let html = '';
            $('.search_dropdown ul').empty();
            console.log(res)
            $.each(res, function (key, value) {
                html += ' <li>\n' +
                    '                            <a href="' + value.url + '">\n' +
                    '                                <span class="result_cat">' + value.type + '</span>\n' +
                    '                                <p class="result_title">' + value.title + '</p>\n' +
                    '                            </a>\n' +
                    '                        </li>';
            });
            $('.search_dropdown ul').append(html);
        });
})
