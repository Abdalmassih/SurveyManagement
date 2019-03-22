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
		question: "Add your first question!",
		tooltip: "tooltip is optional",
		children: [
			{
				question: "Element 1",
				children: [
					{
						question: "Element 1.1",
						children: []
					},
					{
						question: "Element 1.2",
						children: [
							{
								question: "Element 1.2.1",
								children: []
							}
						]
					}
				]
			}
		]
	};

	renderTree(questions);

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
