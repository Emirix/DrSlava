
import React, { useState } from 'react';
import { Link } from 'react-router-dom';

const Navbar: React.FC = () => {
  const [isOpen, setIsOpen] = useState(false);

  const navLinks = [
    { name: 'Home', path: '/' },
    { name: 'Services', path: '/services' },
    { name: 'Gallery', path: '/gallery' },
    { name: 'Locations', path: '/branches' },
    { name: 'Contact', path: '/contact' },
  ];

  return (
    <nav className="sticky top-0 z-50 bg-nude-50/80 backdrop-blur-md border-b border-nude-200">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between items-center h-20">
          <div className="flex-shrink-0 flex items-center">
            <Link to="/" className="font-serif text-3xl tracking-widest text-nude-500 hover:text-nude-400 transition-colors">
              LUMIÈRE
            </Link>
          </div>
          
          <div className="hidden md:flex items-center space-x-8">
            <div className="flex items-baseline space-x-8">
              {navLinks.map((link) => (
                <Link
                  key={link.name}
                  to={link.path}
                  className="text-sm font-light uppercase tracking-widest hover:text-nude-500 transition-colors duration-300"
                >
                  {link.name}
                </Link>
              ))}
            </div>

            <div className="flex items-center space-x-6 pl-8 border-l border-nude-200">
              <a 
                href="https://instagram.com" 
                target="_blank" 
                rel="noopener noreferrer"
                className="flex items-center gap-2 group px-4 py-2 border border-nude-200 rounded-full hover:border-nude-400 hover:bg-nude-100 transition-all duration-300"
                aria-label="Instagram"
              >
                <svg className="w-4 h-4 text-nude-500 group-hover:text-nude-600 transition-colors" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
                <span className="text-[10px] uppercase tracking-[0.2em] font-medium text-nude-500 group-hover:text-nude-600">Instagram</span>
              </a>
              <Link
                to="/contact"
                className="bg-nude-400 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-nude-500 transition-all transform hover:scale-105 shadow-sm"
              >
                Book Now
              </Link>
            </div>
          </div>

          <div className="md:hidden flex items-center space-x-4">
            <button
              onClick={() => setIsOpen(!isOpen)}
              className="text-nude-500 hover:text-nude-400 focus:outline-none"
            >
              <svg className="h-8 w-8" fill="none" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" viewBox="0 0 24 24" stroke="currentColor">
                {isOpen ? (
                  <path d="M6 18L18 6M6 6l12 12" />
                ) : (
                  <path d="M4 6h16M4 12h16m-7 6h7" />
                )}
              </svg>
            </button>
          </div>
        </div>
      </div>

      {/* Mobile Menu */}
      {isOpen && (
        <div className="md:hidden bg-nude-50 animate-fade-in border-b border-nude-100">
          <div className="px-4 pt-4 pb-8 space-y-4 text-center">
            {navLinks.map((link) => (
              <Link
                key={link.name}
                to={link.path}
                onClick={() => setIsOpen(false)}
                className="block text-lg font-serif tracking-widest hover:text-nude-500 transition-colors"
              >
                {link.name}
              </Link>
            ))}
            <div className="flex justify-center py-4">
               <a 
                href="https://instagram.com" 
                target="_blank" 
                rel="noopener noreferrer" 
                className="flex items-center gap-3 px-6 py-2 border border-nude-200 rounded-full text-nude-500 hover:bg-nude-100 transition-all"
               >
                <svg className="w-5 h-5" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
                <span className="text-xs uppercase tracking-widest font-medium">Instagram</span>
              </a>
            </div>
            <Link
              to="/contact"
              onClick={() => setIsOpen(false)}
              className="inline-block bg-nude-400 text-white px-8 py-3 rounded-full text-base font-medium shadow-md w-full max-w-xs"
            >
              Book Appointment
            </Link>
          </div>
        </div>
      )}
    </nav>
  );
};

export default Navbar;
