export class Parts {
  init() {
    this.TopicSelect();
  }

  TopicSelect() {
    $(document).ready(function () {
      $(".topic-select").select2({
        closeOnSelect: true,
        minimumResultsForSearch: Infinity,
        allowClear: false,
        dropdownCssClass: "categories-select2",
      });
    });
  }
}
