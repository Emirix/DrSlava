
import React from 'react';

const Contact: React.FC = () => {
  return (
    <div className="bg-nude-50 min-h-screen py-24 px-4">
      <div className="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-start">
        <div className="space-y-12 animate-slide-up">
          <div className="space-y-6">
            <h1 className="font-serif text-5xl md:text-6xl text-gray-900">Get in Touch</h1>
            <p className="text-gray-500 font-light text-lg leading-relaxed max-w-lg">
              Whether you have a question about our services or want to book a specialized consultation, our team is here to assist you.
            </p>
          </div>

          <div className="space-y-8">
            <div className="flex gap-6 items-center">
              <div className="w-14 h-14 rounded-full bg-white luxury-shadow flex items-center justify-center text-nude-500">📞</div>
              <div>
                <h4 className="font-medium text-sm text-gray-800 uppercase tracking-widest">Call or WhatsApp</h4>
                <p className="text-gray-500 font-light">+1 (555) LUMIERE</p>
              </div>
            </div>
            <div className="flex gap-6 items-center">
              <div className="w-14 h-14 rounded-full bg-white luxury-shadow flex items-center justify-center text-nude-500">✉️</div>
              <div>
                <h4 className="font-medium text-sm text-gray-800 uppercase tracking-widest">Email</h4>
                <p className="text-gray-500 font-light">concierge@lumiere-beauty.com</p>
              </div>
            </div>
            <div className="flex gap-6 items-center">
              <div className="w-14 h-14 rounded-full bg-white luxury-shadow flex items-center justify-center text-nude-500">📍</div>
              <div>
                <h4 className="font-medium text-sm text-gray-800 uppercase tracking-widest">Headquarters</h4>
                <p className="text-gray-500 font-light">123 Aesthetic Plaza, NY 10001</p>
              </div>
            </div>
          </div>

          <div className="pt-8 border-t border-nude-200">
            <h4 className="font-serif text-2xl mb-6 italic">Connect with us</h4>
            <div className="flex gap-4">
              {['Instagram', 'Facebook', 'TikTok'].map(s => (
                <a key={s} href="#" className="bg-white px-6 py-2 rounded-full text-xs font-medium tracking-widest border border-nude-200 hover:border-nude-500 hover:text-nude-500 transition-all luxury-shadow">
                  {s.toUpperCase()}
                </a>
              ))}
            </div>
          </div>
        </div>

        <div className="bg-white p-8 md:p-12 rounded-3xl luxury-shadow border border-nude-100 animate-fade-in">
          <form className="space-y-6">
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div className="space-y-2">
                <label className="text-xs uppercase tracking-widest text-gray-400 font-medium ml-2">Full Name</label>
                <input 
                  type="text" 
                  placeholder="Jane Doe"
                  className="w-full bg-nude-50 border border-nude-100 rounded-2xl px-6 py-4 text-sm focus:outline-none focus:border-nude-300 transition-all"
                />
              </div>
              <div className="space-y-2">
                <label className="text-xs uppercase tracking-widest text-gray-400 font-medium ml-2">Email Address</label>
                <input 
                  type="email" 
                  placeholder="jane@example.com"
                  className="w-full bg-nude-50 border border-nude-100 rounded-2xl px-6 py-4 text-sm focus:outline-none focus:border-nude-300 transition-all"
                />
              </div>
            </div>
            <div className="space-y-2">
              <label className="text-xs uppercase tracking-widest text-gray-400 font-medium ml-2">Interested In</label>
              <select className="w-full bg-nude-50 border border-nude-100 rounded-2xl px-6 py-4 text-sm focus:outline-none focus:border-nude-300 transition-all appearance-none">
                <option>Select a service</option>
                <option>Facial & Skincare</option>
                <option>Hair Styling & Color</option>
                <option>Spa & Wellness</option>
                <option>Nail Artistry</option>
              </select>
            </div>
            <div className="space-y-2">
              <label className="text-xs uppercase tracking-widest text-gray-400 font-medium ml-2">Your Message</label>
              <textarea 
                rows={4}
                placeholder="How can we help you glow today?"
                className="w-full bg-nude-50 border border-nude-100 rounded-2xl px-6 py-4 text-sm focus:outline-none focus:border-nude-300 transition-all resize-none"
              ></textarea>
            </div>
            <button className="w-full bg-nude-400 text-white py-5 rounded-2xl font-medium tracking-widest text-sm hover:bg-nude-500 transition-all transform hover:scale-[1.02] shadow-lg">
              SEND INQUIRY
            </button>
            <p className="text-[10px] text-gray-400 text-center uppercase tracking-widest mt-4">We usually respond within 2 business hours.</p>
          </form>
        </div>
      </div>
    </div>
  );
};

export default Contact;
