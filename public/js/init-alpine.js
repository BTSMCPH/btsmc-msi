document.addEventListener('alpine:init', () => {
    Alpine.data('data', () => ({
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen
        },

        closeProfileMenu() {
            this.isProfileMenuOpen = false
        },

        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen
        },

        closeSideMenu() {
            this.isSideMenuOpen = false
        },

        isMultiLevelMenuOpen: false,
        toggleMultiLevelMenu(event) {
            // Prevent the click event from propagating to parent elements
            event.stopPropagation();
            this.isMultiLevelMenuOpen = !this.isMultiLevelMenuOpen;
        },
        closeMultiLevelMenu() {
            this.isMultiLevelMenuOpen = false;
        },
    }))
})
