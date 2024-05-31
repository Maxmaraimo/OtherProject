var countersAnimated = false;
$(window).scroll(function() {
    var viewportHeight = $(window).innerHeight();
    var countersTopPosition = $('#counters').offset().top;
    var scrollTop = $(window).scrollTop();

    if ( (scrollTop + viewportHeight/2 > countersTopPosition) && !countersAnimated) { 
        countersAnimated = true; // Ключ, чтобы анимация сработала только один раз
        $('.counter-value').each(function() {
            let $this = $(this),
            countTo = $this.attr('data-count');
            $({ countNum: $this.text() }).animate({ countNum: countTo },
            {
            duration: 2000,
            easing: 'swing',
            step: function() {
                let num = Math.floor(this.countNum).toLocaleString('en-US');
                switch ($this.siblings('.counter-name').text()) {
                    case 'Суточный оборот более':
                        $this.text('$' + num);
                        break;
                    case 'Инвесторов':
                        num = num + '+';
                        $this.text(num);
                        break;
                    case 'Branch':
                        num = num + '!!';
                        $this.text(num);
                        break;
                    default:
                        $this.text(num);
                        break;
                }
            },
            complete: function() { 
                switch ($this.siblings('.counter-name').text()) {
                    case 'Суточный оборот более':
                        $this.text('$' + this.countNum.toLocaleString('en-US'));
                        break;
                    case 'Инвесторов':
                        $this.text(this.countNum + '+');
                        break;
                    case 'Branch':
                        $this.text(this.countNum + '!!');
                        break;
                    default:
                        $this.text(this.countNum.toLocaleString());
                        break;
                }
            }
            });
        });
    }
});