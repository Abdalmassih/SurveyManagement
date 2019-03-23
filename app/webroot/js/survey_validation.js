$(document).ready(function() {
	// alert('hi!');
	$("#title").blur(() => {
		$.post(
			"/SurveyManagement/cakephp/surveys/validateForm",
			{ field: $("#title").attr("id"), value: $("#title").val() },
			validateTitle
		);
	});

	let questions = {
		question: "What's your first question?",
		id: 1,
		children: []
	};

	renderTree(questions);

	//new/edit question form
	$(".q").click(function() {
		$(".qform").show();
	});
	$("#qform-close").click(function() {
		$(".qform").hide();
	});

	function renderTree(questions) {
		$("#questions").hortree({
			data: [questions]
		});
	}

	function validateTitle(error) {
		if (error.length > 0) {
			if ($("#title-not-empty").length == 0) {
				$("#title").after(
					'<div id="title-not-empty" class="error-message">' + error + "<div>"
				);
			}
		} else {
			$("#title-not-empty").remove();
		}
	}
});
