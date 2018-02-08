$(document).ready(function(){
	'use strict';
    let labelAutoplay = document.getElementById('labelAutoplay');
	let btnAutoplay = document.getElementById('btnAutoplay');
	let checkbox = document.getElementById('autoplay');
	//var checkNewComment = document.getElementsByName('new-comment');
	checkbox.onchange = function (e) {
		let check = checkbox.checked;
		console.log(check);
		if (check) {
			btnAutoplay.style.left = '16px';
			btnAutoplay.style.background = '#2693e6';
			labelAutoplay.style.background = '#93c9f3';
		} else {
			btnAutoplay.style.left = '0';
			btnAutoplay.style.background = '#fafafa';
			labelAutoplay.style.background = '#999999';
		}
	}
	$('.new-comment').focus(function(){
		$('.float-right.option-comment').show();
		$('.comment input').css('border-bottom', '2px solid black');
	});
	$(".new-comment").blur(function(){
        $('.float-right.option-comment').hide();
		$('.comment input').css('border-bottom', '1px solid #e6e6e6');
    });
	$('.new-comment').keydown(function(){
		$('.send-comment').css('background-color', '#2693e6');
		$('.send-comment').css('color', 'white');
	});
	$('.cancel-comment').click(function(){
		$('.float-right.option-comment').hide();
	});
});