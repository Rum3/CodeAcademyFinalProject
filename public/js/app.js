//Module
var moduleId = 1; // Начална стойност на moduleId
document.getElementById('add_module_title').addEventListener('click', function() {
    var newModuleTitle = document.createElement('input');
    var newModuleDescription = document.createElement('textarea');
    var newLineBreak = document.createElement('br');
    var deleteButton = document.createElement('button');
    // Генериране на уникално id
    var titleId = 'module_title_' + moduleId;
    var descriptionId = 'module_description_' + moduleId;
    deleteButton.setAttribute('type', 'button');
    deleteButton.setAttribute('class', 'bg-red-500 text-white px-4 py-2 rounded');
    deleteButton.textContent = 'Delete';
    newModuleTitle.setAttribute('type', 'text');
    newModuleTitle.setAttribute('name', 'module_title[]');
    newModuleTitle.setAttribute('placeholder', 'Module Title');
    newModuleTitle.setAttribute('required', '');
    newModuleTitle.setAttribute('class', 'w-3/4 px-3 py-2 rounded border border-gray-300 mb-4');
    newModuleTitle.setAttribute('id', titleId); // Задаване на уникалното id
    newModuleDescription.setAttribute('name', 'module_description[]');
    newModuleDescription.setAttribute('placeholder', 'Description');
    newModuleDescription.setAttribute('required', '');
    newModuleDescription.setAttribute('class', 'w-3/4 px-3 py-2 rounded border border-gray-300 mb-4');
    newModuleDescription.setAttribute('id', descriptionId); // Задаване на уникалното id
    var addModuleTitle = document.getElementById('add_module_title');
    addModuleTitle.insertAdjacentElement('afterend', newLineBreak);
    addModuleTitle.insertAdjacentElement('afterend', newModuleDescription);
    // addModuleTitle.insertAdjacentElement('afterend', newLineBreak);
    addModuleTitle.insertAdjacentElement('afterend', deleteButton);
    addModuleTitle.insertAdjacentElement('afterend', newModuleTitle);
    moduleId++; // Увеличаване на moduleId с 1
    deleteButton.addEventListener('click', function() {
      newModuleTitle.remove();
      newModuleDescription.remove();
      deleteButton.remove();
      newLineBreak.remove();
    //   lineBreak2.remove();
    });
  });
// Lecture
document.getElementById('add_lecture_label').addEventListener('click', function() {
var newLectureTitle = document.createElement('input');
newLectureTitle.setAttribute('type', 'text');
newLectureTitle.setAttribute('name', 'lecture_title');
newLectureTitle.setAttribute('placeholder', 'Title');
newLectureTitle.setAttribute('required', '');
newLectureTitle.setAttribute('class', 'w-4/5 px-3 py-2 rounded border border-gray-300 mb-4');
var deleteButton = document.createElement('button');
deleteButton.setAttribute('type', 'button');
deleteButton.setAttribute('class', 'bg-red-500 text-white px-4 py-2 rounded');
deleteButton.textContent = 'Delete';
var newLectureDescription = document.createElement('textarea');
newLectureDescription.setAttribute('name', 'lecture_description');
newLectureDescription.setAttribute('placeholder', 'Description');
newLectureDescription.setAttribute('required', '');
newLectureDescription.setAttribute('class', 'w-full px-3 py-2 rounded border border-gray-300 mb-4');
var lineBreak1 = document.createElement('br');
var lineBreak2 = document.createElement('br');
var lineBreak3 = document.createElement('br');
var addLectureLabel = document.getElementById('add_lecture_label');
addLectureLabel.insertAdjacentElement('afterend', lineBreak1);
addLectureLabel.insertAdjacentElement('afterend', newLectureDescription);
addLectureLabel.insertAdjacentElement('afterend', lineBreak2);
addLectureLabel.insertAdjacentElement('afterend', deleteButton);
addLectureLabel.insertAdjacentElement('afterend', newLectureTitle);
addLectureLabel.insertAdjacentElement('afterend', lineBreak3);
deleteButton.addEventListener('click', function() {
  newLectureTitle.remove();
  newLectureDescription.remove();
  deleteButton.remove();
  lineBreak1.remove();
  lineBreak2.remove();
  lineBreak3.remove();
});
});
//   Homework
document.getElementById('add_homework').addEventListener('click', function() {
var newHomeworkDescription = document.createElement('input');
newHomeworkDescription.setAttribute('type', 'text');
newHomeworkDescription.setAttribute('id', 'homework');
newHomeworkDescription.setAttribute('placeholder', 'Homework Description');
newHomeworkDescription.setAttribute('class', 'w-3/4 px-3 py-2 rounded border border-gray-300 mb-4');
var deleteButton = document.createElement('button');
deleteButton.setAttribute('type', 'button');
deleteButton.setAttribute('class', 'bg-red-500 text-white px-4 py-2 rounded');
deleteButton.textContent = 'Delete';
var lineBreak = document.createElement('br');
var addHomework = document.getElementById('add_homework');
addHomework.insertAdjacentElement('afterend', lineBreak);
addHomework.insertAdjacentElement('afterend', deleteButton);
addHomework.insertAdjacentElement('afterend', newHomeworkDescription);
deleteButton.addEventListener('click', function() {
    newHomeworkDescription.remove();
    deleteButton.remove();
    lineBreak.remove();
});
});
