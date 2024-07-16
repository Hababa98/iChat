(async function () {
  let boards;
  const assetsPath = document.querySelector('html').getAttribute('data-assets-path');

  // Init kanban Offcanvas
  // const kanbanOffcanvas = new bootstrap.Offcanvas(kanbanSidebar);

  // Get kanban data
  const kanbanResponse = await fetch(assetsPath + 'json/kanban.json');
  console.log(kanbanResponse);
  if (!kanbanResponse.ok) {
    console.error('error', kanbanResponse);
  }
  boards = await kanbanResponse.json();

  function renderBoardDropdown() {
    return (
      "<div class='dropdown'>" +
      "<i class='dropdown-toggle bx bx-dots-vertical-rounded cursor-pointer fs-4' id='board-dropdown' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></i>" +
      "<div class='dropdown-menu dropdown-menu-end' aria-labelledby='board-dropdown'>" +
      "<a class='dropdown-item delete-board' href='javascript:void(0)'> <i class='bx bx-trash bx-xs'></i> <span class='align-middle'>Delete</span></a>" +
      "<a class='dropdown-item' href='javascript:void(0)'><i class='bx bx-rename bx-xs'></i> <span class='align-middle'>Rename</span></a>" +
      "<a class='dropdown-item' href='javascript:void(0)'><i class='bx bx-archive bx-xs'></i> <span class='align-middle'>Archive</span></a>" +
      '</div>' +
      '</div>'
    );
  }
  // Render item dropdown
  function renderDropdown() {
    return (
      "<div class='dropdown kanban-tasks-item-dropdown'>" +
      "<i class='dropdown-toggle bx bx-dots-vertical-rounded' id='kanban-tasks-item-dropdown' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></i>" +
      "<div class='dropdown-menu dropdown-menu-end' aria-labelledby='kanban-tasks-item-dropdown'>" +
      "<a class='dropdown-item' href='javascript:void(0)'>Copy task link</a>" +
      "<a class='dropdown-item' href='javascript:void(0)'>Duplicate task</a>" +
      "<a class='dropdown-item delete-task' href='javascript:void(0)'>Delete</a>" +
      '</div>' +
      '</div>'
    );
  }
  // Render header
  function renderHeader(color, text) {
    return (
      "<div class='d-flex justify-content-between flex-wrap align-items-center mb-2 pb-1'>" +
      "<div class='item-badges'> " +
      "<div class='badge rounded-pill bg-label-" +
      color +
      "'> " +
      text +
      '</div>' +
      '</div>' +
      renderDropdown() +
      '</div>'
    );
  }

  // Render avatar
  function renderAvatar(images, pullUp, size, margin, members) {
    var $transition = pullUp ? ' pull-up' : '',
      $size = size ? 'avatar-' + size + '' : '',
      member = members == undefined ? ' ' : members.split(',');

    return images == undefined
      ? ' '
      : images
          .split(',')
          .map(function (img, index, arr) {
            var $margin = margin && index !== arr.length - 1 ? ' me-' + margin + '' : '';

            return (
              "<div class='avatar " +
              $size +
              $margin +
              "'" +
              "data-bs-toggle='tooltip' data-bs-placement='top'" +
              "title='" +
              member[index] +
              "'" +
              '>' +
              "<img src='" +
              assetsPath +
              'img/avatars/' +
              img +
              "' alt='Avatar' class='rounded-circle " +
              $transition +
              "'>" +
              '</div>'
            );
          })
          .join(' ');
  }

  function renderFooter(attachments, comments, assigned, members) {
    return (
      "<div class='d-flex justify-content-between align-items-center flex-wrap mt-2 pt-1'>" +
      "<div class='d-flex'> <span class='d-flex align-items-center me-2'><i class='bx bx-paperclip me-1'></i>" +
      "<span class='attachments'>" +
      attachments +
      '</span>' +
      "</span> <span class='d-flex align-items-center'><i class='bx bx-chat me-1'></i>" +
      '<span> ' +
      comments +
      ' </span>' +
      '</span></div>' +
      "<div class='avatar-group d-flex align-items-center assigned-avatar'>" +
      renderAvatar(assigned, true, 'xs', null, members) +
      '</div>' +
      '</div>'
    );
  }
  const kanban = new jKanban({
    element: '.kanban-wrapper',
    gutter: '15px',
    widthBoard: '400px',
    dragItems: true,
    boards: boards,
    dragBoards: true,
    addItemButton: true
  });

  const kanbanContainer = document.querySelector('.kanban-container'),
    kanbanTitleBoard = [].slice.call(document.querySelectorAll('.kanban-title-board')),
    kanbanItem = [].slice.call(document.querySelectorAll('.kanban-item'));

  // Render custom items
  if (kanbanItem) {
    kanbanItem.forEach(function (el) {
      const element = "<span class='kanban-text'>" + el.textContent + '</span>';
      let img = '';
      if (el.getAttribute('data-image') !== null) {
        img =
          "<img class='img-fluid rounded-3 mb-2' src='" +
          assetsPath +
          'img/elements/' +
          el.getAttribute('data-image') +
          "'>";
      }
      el.textContent = '';
      if (el.getAttribute('data-badge') !== undefined && el.getAttribute('data-badge-text') !== undefined) {
        el.insertAdjacentHTML(
          'afterbegin',
          renderHeader(el.getAttribute('data-badge'), el.getAttribute('data-badge-text')) + img + element
        );
      }
    });
  }

  const deleteTask = [].slice.call(document.querySelectorAll('.delete-task'));
  if (deleteTask) {
    deleteTask.forEach(function (e) {
      e.addEventListener('click', function () {
        const id = this.closest('.kanban-item').getAttribute('data-eid');
        kanban.removeElement(id);
      });
    });
  }
})();
