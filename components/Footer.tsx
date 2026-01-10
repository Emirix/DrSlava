
import React from 'react';
import { Link } from 'react-router-dom';

const Footer: React.FC = () => {
  return (
    <footer className="bg-nude-100 pt-20 pb-10 border-t border-nude-200">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
          <div className="col-span-1 md:col-span-1">
            <h2 className="font-serif text-3xl tracking-widest text-nude-500 mb-6">LUMIÈRE</h2>
            <p className="text-sm font-light leading-relaxed text-gray-500">
              Redefining beauty through professional care and hygienic excellence. Your sanctuary for modern aesthetic treatments.
            </p>
          </div>
          
          <div>
            <h3 className="text-sm font-medium uppercase tracking-widest mb-6 text-gray-800">Explore</h3>
            <ul className="space-y-4">
              {['Home', 'Services', 'Gallery', 'Locations'].map((item) => (
                <li key={item}>
                  <Link to={`/${item === 'Home' ? '' : item.toLowerCase()}`} className="text-sm text-gray-500 hover:text-nude-500 transition-colors font-light">
                    {item}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h3 className="text-sm font-medium uppercase tracking-widest mb-6 text-gray-800">Support</h3>
            <ul className="space-y-4">
              <li><Link to="/contact" className="text-sm text-gray-500 hover:text-nude-500 transition-colors font-light">Book Online</Link></li>
              <li><Link to="/contact" className="text-sm text-gray-500 hover:text-nude-500 transition-colors font-light">Gift Cards</Link></li>
              <li><Link to="/contact" className="text-sm text-gray-500 hover:text-nude-500 transition-colors font-light">Terms & Privacy</Link></li>
            </ul>
          </div>

          <div>
            <h3 className="text-sm font-medium uppercase tracking-widest mb-6 text-gray-800">Newsletter</h3>
            <p className="text-xs font-light text-gray-500 mb-4 italic">Join our list for exclusive beauty tips & offers.</p>
            <div className="flex">
              <input
                type="email"
                placeholder="Your email"
                className="bg-white border border-nude-200 rounded-l-full px-4 py-2 text-sm w-full focus:outline-none focus:border-nude-400"
              />
              <button className="bg-nude-400 text-white px-4 py-2 rounded-r-full hover:bg-nude-500 transition-colors">
                <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </button>
            </div>
          </div>
        </div>
        
        <div className="border-t border-nude-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
          <p className="text-xs font-light text-gray-400 italic">
            &copy; {new Date().getFullYear()} Lumière Beauty Salon. All rights reserved.
          </p>
          <div className="flex space-x-6">
            {['instagram', 'facebook', 'twitter'].map((social) => (
              <a key={social} href="#" className="text-gray-400 hover:text-nude-500 transition-colors">
                <span className="sr-only">{social}</span>
                <div className="w-5 h-5 bg-current rounded-sm"></div>
              </a>
            ))}
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
