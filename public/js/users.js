const roleSelect = document.getElementById('roleSelect');
const trainingsContainer = document.getElementById('trainingsContainer');

roleSelect.addEventListener('change', function() {
  const selectedRole = roleSelect.value;
  trainingsContainer.style.display = (selectedRole === 'student' || selectedRole === 'teacher') ? 'block' : 'none';
});
