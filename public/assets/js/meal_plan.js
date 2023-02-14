var day = 2;
$(document).ready(function() {
  $('#add-day').click(function() {
    var newRow = `<tr>
                    <td>`+day+`</td>
                    <td><input type="radio" name="day`+day+`" value="BB"></td>
                    <td><input type="radio" name="day`+day+`" value="HB"></td>
                    <td><input type="radio" name="day`+day+`" value="FB"></td>
                  </tr>`;
    $('#meal-plan-table tbody').append(newRow);
    day++;
  });
  $('#submit-plan').click(function() {
    var selectedPlans = [];
    $('input[type=radio]:checked').each(function() {
      selectedPlans.push($(this).val());
    });
    $('#selected-plan').html('You have selected: ' + selectedPlans.join(', ') + ' meal plans');
  });
});