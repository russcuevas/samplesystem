const profileContainer = document.querySelector('.profile');
const dropdown = document.querySelector('.dropdown');

let isOpen = false; // Variable to track dropdown state

profileContainer.addEventListener('click', () => {
  isOpen = !isOpen; // Toggle the dropdown state
  if (isOpen) {
    dropdown.style.display = 'block'; // Show the dropdown
  } else {
    dropdown.style.display = 'none'; // Hide the dropdown
  }
});

// Hide dropdown when clicking outside the profile container
document.addEventListener('click', (event) => {
  const targetElement = event.target;
  if (!profileContainer.contains(targetElement)) {
    isOpen = false; // Set dropdown state to closed
    dropdown.style.display = 'none'; // Hide the dropdown
  }
});