
        $(document).ready(function() {
            $('.preloader').fadeOut();
        });
        var word = $('.desktop_damage_text .damage_word').text();
        $('.md_first').text(joinText(word, 0, 2));
        $('.md_second').text(joinText(word, 2, 4));
        $('.md_third').text(joinText(word, 4, word.length));

        function joinText(text, start, end) {
            return text.slice(start, end);
        }
        if ($(window).width() > 1000) {
            $(window).scroll(function() {
                var scrollT = $(window).scrollTop();
                var scrollTY = $(window).scrollTop() / 20;
                var genocide = $('.ethnic_imageside').offset().top;
                var genocideTop = $('.ethnic_imageside').offset().top + 200;
                var ethnic = $('.ethnic_container ').offset().top - 200;
                var map = $('.ekosid-head').offset().top + 600;
                // if ($(window).scrollTop() < 100) {
                //     $('.main_banner_image img').css('transform', 'scale(1.03' + scrollT + ')');
                // }

                if ($(window).scrollTop() >= map) {
                    $('.cerniy_sad_image_block img').css({
                        "transform": "translate(0)",
                        "opacity": "1"
                    });
                }

                if ($(window).scrollTop() >= ethnic) {
                    $('.ethnic_image img').css('transform', 'scale(1.06)');
                } else {
                    $('.ethnic_image img').css('transform', 'scale(1.0)');
                }
                if ($(window).scrollTop() >= genocide) {
                    $('.damage_word ').css('background-position', 'right top  -' + scrollTY + 'px');
                } else if ($(window).scrollTop() <= genocideTop) {
                    $('.damage_word ').css('background-position', 'right   ' + scrollTY + 'px');
                }
                //$('.main_banner_image img').css('transform', 'scale(0. ' + scrollT + ')');

                //$('.banner_title_container_in ').css('transform', 'translateY(-' + scrollTY + 'px )');
            });

            var kalbajar_main = $('.kalbajar_side').attr('src');
            var tartar_main = $('.tartar_side').attr('src');
            var agdam_main = $('.agdam_side').attr('src');
            var lachin_main = $('.lachin_side').attr('src');
            var khojaly_main = $('.khojaly_side').attr('src');
            var shusa_main = $('.shusa_side').attr('src');
            var khojavand_main = $('.khojavand_side').attr('src');
            var gubadli_main = $('.gubadli_side').attr('src');
            var fizuli_main = $('.fizuli_side').attr('src');
            var jabrail_main = $('.jabrail_side').attr('src');
            var zengilan_main = $('.zengilan_side').attr('src');

            $(".kalbajar_link").hover(
                function() {
                    $('.kalbajar_side').css('opacity', '0.5');
                },
                function() {
                    $('.kalbajar_side').css('opacity', '1')
                }
            );
            $(".tartar_link").hover(
                function() {
                    $('.tartar_side').css('opacity', '0.5');
                },
                function() {
                    $('.tartar_side').css('opacity', '1');
                }
            );
            $(".agdam_link").hover(
                function() {
                    $('.agdam_side').css('opacity', '0.5');
                },
                function() {
                    $('.agdam_side').css('opacity', '1');
                }
            );
            $(".lachin_link").hover(
                function() {
                    $('.lachin_side').css('opacity', '0.5');
                },
                function() {
                    $('.lachin_side').css('opacity', '1');
                }
            );
            $(".khojaly_link").hover(
                function() {
                    $('.khojaly_side').css('opacity', '0.5');
                },
                function() {
                    $('.khojaly_side').css('opacity', '1');
                }
            );
            $(".shusa_link").hover(
                function() {
                    $('.shusa_side').css('opacity', '0.5');
                    $('.khojaly_side').css('opacity', '0.5');
                },
                function() {
                    $('.shusa_side').css('opacity', '1');
                    $('.khojaly_side').css('opacity', '1');
                }
            );
            $(".khojavand_link").hover(
                function() {
                    $('.khojavand_side').css('opacity', '0.5');
                },
                function() {
                    $('.khojavand_side').css('opacity', '1');
                }
            );
            $(".gubadli_link").hover(
                function() {
                    $('.gubadli_side').css('opacity', '0.5');
                },
                function() {
                    $('.gubadli_side').css('opacity', '1');
                }
            );
            $(".fizuli_link").hover(
                function() {
                    $('.fizuli_side').css('opacity', '0.5');
                },
                function() {
                    $('.fizuli_side').css('opacity', '1');
                }
            );

            $(".jabrail_link").hover(
                function() {
                    $('.jabrail_side').css('opacity', '0.5');
                },
                function() {
                    $('.jabrail_side').css('opacity', '1');
                }
            );
            $(".zangilan_link").hover(
                function() {
                    $('.zengilan_side').css('opacity', '0.5');
                },
                function() {
                    $('.zengilan_side').css('opacity', '1');
                }
            );


            $(window).on('load', function() {
                $('.banner_title_container_in').addClass('active');
            });
            var wheight = $(window).height();

            var wWidth = $(window).width();

            // var infobar = $('.damage_text').offset().top + 120;
            var infobar = $('.damage_text').offset().top + 50;
            var eko = $('.ekosid').offset().top + 300;
            var cerniy = $('.cerniy-heading').offset().top;
            var win = $('.win-body').offset().top - 100;
            var ban = $('.banner_title_cont ').offset().top;

            if (wWidth < 1400) {
                var eko = $('.ekosid').offset().top + 200;

            }

            if (wWidth > 1400) {
                var infobar = $('.damage_text').offset().top + 150;
            }

            if (wWidth > 2000) {
                var infobar = $('.damage_text').offset().top - 250;
                var ban = $('.banner_title_cont ').offset().top - 200;
            }

            if ((wWidth > 1500) && (wWidth < 1600)) {
                var infobar = $('.damage_text').offset().top - 100;
                var eko = $('.ekosid').offset().top + 50;
            }

            if ((wWidth > 1400) && (wWidth < 1500)) {
                var eko = $('.ekosid').offset().top + 100;
            }

            if ((wWidth < 1500) && (wheight > 760)) {
                var infobar = $('.damage_text').offset().top;
            }

            $(window).on('scroll', function() {
                scroll_fromtop = $(window).scrollTop();
                if (scroll_fromtop > infobar) {
                    $('.ethnic_section ').addClass('scroll_out');
                } else {
                    $('.ethnic_section ').addClass('scrolling_animation');
                    $('.ethnic_section ').removeClass('scroll_out');
                }

                if (scroll_fromtop > cerniy) {
                    $('.ekosid ').addClass('scroll_out');
                } else {
                    $('.ekosid ').addClass('scrolling_animation');
                    $('.ekosid ').removeClass('scroll_out');
                }

                if (scroll_fromtop > ban) {
                    $('.banner_title_cont  ').addClass('scroll_out');
                } else {
                    $('.banner_title_cont  ').addClass('scrolling_animation');
                    $('.banner_title_cont  ').removeClass('scroll_out');
                }

                if (scroll_fromtop > win) {
                    $('.cerniy_sad ').addClass('scroll_out');
                } else {
                    $('.cerniy_sad ').addClass('scrolling_animation');
                    $('.cerniy_sad ').removeClass('scroll_out');
                }

                if (scroll_fromtop > eko) {
                    $('.damage_section  ').addClass('scroll_out');
                    $('.main_page_infonumbers ').addClass('scroll_out')
                } else {
                    $('.damage_section ').addClass('scrolling_animation');
                    $('.damage_section ').removeClass('scroll_out');
                    $('.main_page_infonumbers ').addClass('scrolling_animation');
                    $('.main_page_infonumbers ').removeClass('scroll_out');
                }

            });
        }

        AOS.init({
            disable: function() {
                var maxWidth = 1000;
                return window.innerWidth < maxWidth;
            }
        });

        // if ($(window).width() < 1000) {
        //     $('data-aos').replaceWith("data-osa");
        // }

        var classlist = ["page-one", "page-two", "page-three", "page-four"];
        randomkey = Math.floor(Math.random() * classlist.length),

            document.getElementById('eth_img').classList.add(classlist[randomkey])

        var a = 0;
        $(window).scroll(function() {

            var oTop = $('.mobile_ethnic_section ').offset().top - (window.innerHeight - 200);
            var sc = oTop + 400;

            if (a == 0 && $(window).scrollTop() > sc) {
                $('.cpi_val').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                            countNum: countTo
                        },

                        {

                            duration: 2500,
                            easing: 'swing',
                            step: function() {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function() {
                                $this.text(this.countNum);
                                //alert('finished');
                            }

                        });
                });
                a = 1;
            }

        });