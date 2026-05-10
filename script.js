// script.js - Modern Glass Alerts
function showGlassAlert(type, title, message) {
    // Hum SweetAlert2 library ka use karenge jo premium glass look deta hai
    const bgColor = type === 'success' ? 'rgba(56, 189, 248, 0.2)' : 'rgba(239, 68, 68, 0.2)';
    
    Swal.fire({
        title: title,
        text: message,
        icon: type,
        background: '#0d1117',
        color: '#fff',
        backdrop: `rgba(0,0,123,0.4) blur(4px)`,
        confirmButtonColor: '#38bdf8',
        customClass: {
            popup: 'glass-popup'
        }
    });
}

// Mobile Navbar Toggle (Optional)
const navToggle = () => {
    // Add logic here if you want mobile menu animations
};