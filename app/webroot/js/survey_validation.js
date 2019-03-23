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
		children: [
			{
				question: "Element 1",
				id: 2,
				type: "y",
				children: []
			},
			{
				question: "Element 1.1",
				id: 3,
				type: "n",
				children: []
			}
		]
	};

	renderTree(questions);

	//new/edit question form
	$(".q").click(function() {
		// console.log(clickedQId);
		var clickedQ = getQuestionById($(this).attr("id"), questions);
		var yesQ = "",
			noQ = "";
		var firstChild = clickedQ.children[0];
		var secondChild = clickedQ.children[1];
		// console.log(firstChild);
		// console.log(secondChild);

		if (firstChild !== undefined) {
			switch (firstChild.type) {
				case "y":
					yesQ = firstChild.question;
					break;

				case "n":
					noQ = firstChild.question;
					break;

				default:
					break;
			}
		}

		if (secondChild !== undefined) {
			switch (secondChild.type) {
				case "y":
					yesQ = secondChild.question;
					break;

				case "n":
					noQ = secondChild.question;
					break;

				default:
					break;
			}
		}

		$(".qform")
			.show()
			.find("#qtext")
			.val(clickedQ.question);

		$(".qform")
			.find("#yq")
			.val(yesQ);

		$(".qform")
			.find("#nq")
			.val(noQ);
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

	function getQuestionById(id, questions) {
		if (questions.id == id) {
			return questions;
		}

		if (
			questions.children[0] !== undefined &&
			questions.children[0].length != 0
		) {
			var q = getQuestionById(id, questions.children[0]);
			if (q) {
				return q;
			}
			if (
				questions.children[1] !== undefined &&
				questions.children[1].length != 0
			) {
				q = getQuestionById(id, questions.children[1]);
				if (q) {
					return q;
				}
			}
		}
	}
});
