$(function () {
    $("#sortable").sortable({
        items: ".sorting",
        cursor: 'move',
        opacity: 0.6,
        update: function () {
            sendOrderToServer();
        }
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function sendOrderToServer() {
    let orders = [];
    $('li.sorting').each(function (index) {
        orders.push({
            key: $(this).attr('data-id'),
            index: index++
        });
    });

    let module_type = $('input[name="module_type"]').val();
    let module_id = $('input[name="module_id"]').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: '/module-sorting',
        data: {
            orders: orders,
            module_type: module_type,
            module_id: module_id
        },
        success: function (response) {
            console.log(response);
        }
    });
}


$(document).ready(function () {
    $().ready(function () {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
            if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                $('.fixed-plugin .dropdown').addClass('open');
            }

        }

        $('.fixed-plugin a').click(function (event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
                if (event.stopPropagation) {
                    event.stopPropagation();
                } else if (window.event) {
                    window.event.cancelBubble = true;
                }
            }
        });

        $('.fixed-plugin .active-color span').click(function () {
            $full_page_background = $('.full-page-background');

            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
                $sidebar.attr('data-color', new_color);
            }

            if ($full_page.length != 0) {
                $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.attr('data-color', new_color);
            }
        });

        $('.fixed-plugin .background-color .badge').click(function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('background-color');

            if ($sidebar.length != 0) {
                $sidebar.attr('data-background-color', new_color);
            }
        });

        $('.fixed-plugin .img-holder').click(function () {
            $full_page_background = $('.full-page-background');

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            var new_image = $(this).find("img").attr('src');

            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                $sidebar_img_container.fadeOut('fast', function () {
                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $sidebar_img_container.fadeIn('fast');
                });
            }

            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $full_page_background.fadeOut('fast', function () {
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    $full_page_background.fadeIn('fast');
                });
            }

            if ($('.switch-sidebar-image input:checked').length == 0) {
                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
        });

        $('.switch-sidebar-image input').change(function () {
            $full_page_background = $('.full-page-background');

            $input = $(this);

            if ($input.is(':checked')) {
                if ($sidebar_img_container.length != 0) {
                    $sidebar_img_container.fadeIn('fast');
                    $sidebar.attr('data-image', '#');
                }

                if ($full_page_background.length != 0) {
                    $full_page_background.fadeIn('fast');
                    $full_page.attr('data-image', '#');
                }

                background_image = true;
            } else {
                if ($sidebar_img_container.length != 0) {
                    $sidebar.removeAttr('data-image');
                    $sidebar_img_container.fadeOut('fast');
                }

                if ($full_page_background.length != 0) {
                    $full_page.removeAttr('data-image', '#');
                    $full_page_background.fadeOut('fast');
                }

                background_image = false;
            }
        });

        $('.switch-sidebar-mini input').change(function () {
            $body = $('body');

            $input = $(this);

            if (md.misc.sidebar_mini_active == true) {
                $('body').removeClass('sidebar-mini');
                md.misc.sidebar_mini_active = false;

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

            } else {

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                setTimeout(function () {
                    $('body').addClass('sidebar-mini');

                    md.misc.sidebar_mini_active = true;
                }, 300);
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function () {
                window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function () {
                clearInterval(simulateWindowResize);
            }, 1000);

        });
    });

    md.initDashboardPageCharts();

    // New FrontEnd JS

    sameFunction = (elem) => {
        var closeButton = $('<a/>', {
            class: 'close-label',
            text: 'x'
        })
        closeButton.click(function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().remove()
            if (!$('.form-elements').find(':input').length) {
                $('.not-section').show();
                $('.save-button').hide();
            }
        })
        var label = $('<label/>', {
            class: 'label-simple'
        })
        var colMd12 = $('<div/>', {
            class: 'col-md-12'
        })
        var formGroup = $('<div/>', {
            class: 'form-group'
        })
        // var sortIcon = $('<span/>', {
        //     class: 'material-icons',
        //     text: 'sort'
        // })
        elem.appendTo(label);
        // elem.prop('required', 'true');
        closeButton.appendTo(label);
        label.appendTo(formGroup);
        // sortIcon.prependTo(label);
        formGroup.appendTo(colMd12);
        colMd12.appendTo('.admin-form .form-elements');

        //bazaya module detail elave etmek

    }
    ajaxPostSelectData = (type) => {
        let result = [];
        $.ajax({
            type: "POST",
            url: '/module-fill-select',
            data: {
                type: type
            },
            async: false,
            success: function (data) {
                result = data.data;
            }
        });
        return result;
    }

    fillSelectData = (type) => {
        var select = $('<select />', {
            class: 'property form-control',
            name: type + '[]'
        });
        let options = ajaxPostSelectData(type);
        $(select).append($('<option>', {value: '', text: type.charAt(0).toUpperCase() + type.slice(1) + ' seçin'}));
        $.each(options, function (key, value) {
            let title = value.title ? value.title : value.single_translation.title;
            $(select).append($('<option>', {value: value.id, text: title}));
        });
        sameFunction(select);
    }

    $('#addToForm').on('click', function (e) {
        e.preventDefault();

        $('.not-section').hide();
        $('.save-button').show();
        var selectArray = ["chart", "gallery", "timeline", "before_after"];
        var selectActiveValue = $('.body-select');
        if (selectActiveValue.val() === 'image') {
            let input = $('<input />', {
                class: 'property form-control',
                name: 'image[]',
                type: 'file'
            });
            sameFunction(input);
        } else if (selectActiveValue.val() === 'pdf') {
            let input = $('<input />', {
                class: 'property form-control',
                name: 'pdf[]',
                type: 'file'
            });
            sameFunction(input);
        } else if (selectActiveValue.val() === 'banner') {
            let input = $('<input />', {
                class: 'property form-control',
                name: 'banner[]',
                type: 'file'
            });
            sameFunction(input);
        } else if (selectArray.includes(selectActiveValue.val())) {
            fillSelectData(selectActiveValue.val());
        } else if (selectActiveValue.val() === 'editor') {
            sameFunctionEditor();
        }
    });

    sameFunctionEditor = () => {
        var closeButton = $('<a/>', {
            class: 'close-label',
            text: 'x'
        }).css({'width': '25px', 'float': 'right'});
        var label = $('<label/>', {
            class: 'label-simple'
        }).css({'flex-direction': 'column', 'align-items': 'flex-start'});
        var colMd12 = $('<div/>', {
            class: 'col-md-12'
        })
        var formGroup = $('<div/>', {
            class: 'form-group'
        })
        closeButton.click(function (e) {
            e.preventDefault();
            $(this).parent().parent().remove()
            if (!$('.form-elements').find(':input').length) {
                $('.not-section').show();
                $('.save-button').hide();
            }
        });

        if (typeof (Storage) !== "undefined") {
            localStorage.setCount = localStorage.setCount ? Number(localStorage.setCount) + 1 : 1;
        }
        let order = $('textarea').last().attr('data-order') !== undefined ? parseInt($('textarea').last().attr('data-order')) + 1 : 0;

        let html = '<div class="tab-content" id="pills-tabContent">';
        let languageBlock = '<div class="language-block">' +
            ' <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">';
        $.each(langData, function (index, item) {
            let active = !index ? 'active show' : '';
            let lang = item.lang + '-' + localStorage.setCount;
            if (typeof (Storage) !== "undefined") {
                localStorage.setName = localStorage.setName ? Number(localStorage.setName) + 1 : 1;
            }

            languageBlock += ' <li class="nav-item">\n' +
                '                        <a class="nav-link ' + active + '" id="' + lang + '-tab"\n' +
                '                           data-toggle="pill"\n' +
                '                           href="#' + lang + '" role="tab" aria-controls="' + lang + '"\n' +
                '                           aria-selected="true">' + item.title + '</a>\n' +
                '                    </li>';

            html += '<div class="tab-pane ' + active + ' fade"\n' +
                '                                                 id="' + lang + '" role="tabpanel"\n' +
                '                                                 aria-labelledby="' + lang + '-tab">\n' +
                '                                                <div class="col-md-12">\n' +
                '                                                    <div class="form-group">\n' +
                '                                                        <label\n' +
                '                                                            class="bmd-label-floating">Mətn ' + item.lang + '</label>\n' +
                '                                                        <textarea data-order="' + order + '" id="#editor' + localStorage.setName + '" name="content[' + order + '][' + item.lang + ']"\n' +
                '                                                                  class="form-control edit-about"></textarea>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>';
            // initSample('#editor' + localStorage.setName);
        });
        languageBlock += '</ul></div>';
        html += '</div>';

        // elem.prop('required', 'true');
        $(languageBlock).appendTo(label);

        $(html).appendTo(label);

        label.appendTo(formGroup);

        closeButton.appendTo(formGroup);

        formGroup.appendTo(colMd12);

        colMd12.appendTo('.admin-form .form-elements');
        CKEDITOR.replaceAll('edit-about');
    }

//file elave edende base silinsin
    $('label').on('change', '.fileInput', function () {
        $(this).parent().find('input[name="base[]"]').remove();
        $(this).parent().find('input[name="base_pdf[]"]').remove();
    });

    $("#post-module-detail").validate({
        submitHandler: function (form, e) {
            e.preventDefault();
            let myForm = document.getElementById("post-module-detail");
            let formData = new FormData(myForm);

            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
                formData.delete(CKEDITOR.instances[instance].element.getAttribute('name'));
                formData.append(CKEDITOR.instances[instance].element.getAttribute('name'), CKEDITOR.instances[instance].getData());
            }
            $.ajax({
                type: "POST",
                url: '/module-detail',
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function () {
                    swal("Bölmə uğurla əlavə olundu!", {
                        icon: "success",
                        button: false,
                        time: 1500
                    });
                    setTimeout(function () {
                        location.reload()
                    }, 1000)
                }
            });
        },
    });

    $('.list-block a.close-label').on('click', function (e) {
        e.preventDefault();
        // if (CKEDITOR.instances[$(this).parent().find('textarea').attr('id')]) {
        //     CKEDITOR.instances[$(this).parent().find('textarea').attr('id')].destroy(true);
        // }
        console.log($(this).parent().find('textarea'));
        $($(this).parent().find('textarea')).each(function (index, item) {
            if (CKEDITOR.instances[item.getAttribute('id')]) {
                CKEDITOR.instances[item.getAttribute('id')].destroy(true);
            }
        });
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $(this).parent().parent().remove();
        if (!$('.form-elements').find(':input').length) {
            $('.not-section').show();
            $('.save-button').hide();
        }
    })

    $('.gallery-type-change').on('change', function (e) {
        e.preventDefault();
        $('.region-block').hide();

        if (parseInt($(this).val())) {
            $('.region-block').show();
        }
    });

    $('.post-type').on('change', function (e) {
        e.preventDefault();
        $('.post').hide();
        $('.region').hide();
        $('.statia').hide();
        $('.post_tilda').hide();

        if (parseInt($(this).val()) === 0) {
            $('.post').show();
        } else if (parseInt($(this).val()) === 1) {
            $('.region').show();
        } else if (parseInt($(this).val()) === 2) {
            $('.statia').show();
        } else {
            $('.post_tilda').show();
        }
    });

});

