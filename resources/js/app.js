const simpleToast = document.getElementById('simple-toast');
const toastSimpleB = bootstrap.Toast.getOrCreateInstance(simpleToast)
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const myModalAlternative = new bootstrap.Modal('#modals', { keyboard: false });
let resolveGlobal;


// ============= GLOBAL FUNCTION =================

export const refreshTooltips = () => {
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
}

// show simple toas
export const showSimpleToast = (msg = 'nofitication', type) => {
  let bgColour = 'text-bg-danger';
  if (type === 'info') {
    bgColour = 'text-bg-primary';
  }
  simpleToast.classList.forEach(className => {
    if (className.includes('text-bg')) {
      simpleToast.classList.remove(className);
    }
  });
  simpleToast.classList.add(bgColour);
  document.getElementById('simple-toast-msg').innerHTML = msg;
  toastSimpleB.show();
}

export const deleteConfirmation = (callback, msg = 'Are you sure?', buttonType) => {
  let promise = new Promise(function (resolve, reject) {
    let confirmValue = true;
    resolveGlobal = resolve;
    document.getElementById('confirmationMsg').innerHTML = msg;
    document.getElementById('btnConfirmYes').innerHTML = 'YES';
    myModalAlternative.show();
  });
  promise.then(data => {
    if (data) {
      callback();
    }
  });
}
export const modalsFunc = () => {
  resolveGlobal(false);
}
export const confirmationYes = () => {
  resolveGlobal(true);
}
export const toggleDarkMode = () => {
  const current = document.documentElement.getAttribute('data-bs-theme');
  // document.documentElement.setAttribute('data-bs-theme', current == 'dark' ? 'light' : 'dark');
  let finalTheme = current == 'dark' ? 'light' : 'dark';
  console.log('finalTheme', finalTheme);
  changeTheme(finalTheme);
}

export const changeTheme = (theme) => {
  let a = document.querySelectorAll("[data-bs-theme]");
  a.forEach(e => e.dataset.bsTheme = theme);

  if (theme === 'dark') {
    document.querySelectorAll('.link-dark').forEach(b => {
      b.classList.remove('link-dark');
      b.classList.add('link-light');
    });
  } else {
    document.querySelectorAll('.link-light').forEach(b => {
      b.classList.remove('link-light');
      b.classList.add('link-dark');
    });
  }
  localStorage.setItem("theme", theme);

}

export const toggleSidebar = () => {
  document.getElementById('sidebar').classList.toggle('sidebarshow');
  document.getElementById('main').classList.toggle('toggle-main-content');
}

export const resetModalCreateNewApp = () => {
  document.createApp.reset();
}
export const submitCreateAppForm = () => {
  document.createApp.submit();
}
export const deleteAppClient = (e) => {
  deleteConfirmation(() => e.parentElement.submit());
}

// ============== Global Event Listener ================
document.getElementById('modals').addEventListener('hide.bs.modal', modalsFunc);
document.getElementById('btnConfirmYes').addEventListener('click', confirmationYes);
document.getElementById('btnDarkMode').addEventListener('click', toggleDarkMode);