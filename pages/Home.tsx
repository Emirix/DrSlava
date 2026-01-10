
import React from 'react';
import { Link } from 'react-router-dom';

const Home: React.FC = () => {
  const featuredServices = [
    { title: 'Signature Facials', icon: '✨', desc: 'Personalized skin therapy for a radiant glow.' },
    { title: 'Precision Styling', icon: '✂️', desc: 'Expert cuts and coloring tailored to your look.' },
    { title: 'Lash & Brow Care', icon: '👁️', desc: 'Define your gaze with our premium enhancement.' },
    { title: 'Wellness Spa', icon: '🛁', desc: 'Deep relaxation treatments to reset your soul.' },
  ];

  const testimonials = [
    { name: "Sophia Miller", text: "The most relaxing experience I've had. The attention to detail and hygiene is unmatched." },
    { name: "Elena Rossi", text: "I've finally found my go-to salon. Professional staff and such a beautiful, calming space." }
  ];

  return (
    <div className="overflow-hidden">
      {/* Hero Section */}
      <section className="relative h-[85vh] flex items-center justify-center bg-nude-100">
        <div className="absolute inset-0 overflow-hidden">
          <img
            src="https://images.unsplash.com/photo-1560750588-73207b1ef5b8?auto=format&fit=crop&q=80&w=2000"
            alt="Beauty Salon Interior"
            className="w-full h-full object-cover opacity-60 scale-105 animate-[pulse_10s_infinite]"
          />
        </div>
        <div className="relative z-10 text-center px-4 max-w-4xl mx-auto space-y-6 animate-slide-up">
          <span className="uppercase tracking-[0.3em] text-sm font-light text-nude-500 mb-4 block">Est. 2018 — Pure Elegance</span>
          <h1 className="font-serif text-5xl md:text-7xl lg:text-8xl text-gray-900 leading-tight">
            Professional <br /> <span className="italic">Beauty & Care</span>
          </h1>
          <p className="text-lg md:text-xl font-light text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Experience our sanctuary of wellness where expertise meets clinical hygiene for your ultimate aesthetic journey.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center pt-8">
            <Link to="/contact" className="bg-nude-400 text-white px-10 py-4 rounded-full text-lg font-medium hover:bg-nude-500 transition-all luxury-shadow transform hover:scale-105">
              Book Appointment
            </Link>
            <Link to="/services" className="bg-white/80 backdrop-blur-sm border border-nude-300 text-nude-500 px-10 py-4 rounded-full text-lg font-medium hover:bg-nude-50 transition-all transform hover:scale-105">
              View Services
            </Link>
          </div>
        </div>
      </section>

      {/* Featured Services */}
      <section className="py-24 bg-nude-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16 space-y-4">
            <h2 className="font-serif text-4xl md:text-5xl">Our Signature Treatments</h2>
            <p className="text-gray-500 font-light max-w-xl mx-auto italic">Curated experiences designed to enhance your natural radiance.</p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {featuredServices.map((service, idx) => (
              <div 
                key={idx}
                className="bg-white p-8 rounded-3xl luxury-shadow group hover:-translate-y-2 transition-all duration-500 border border-nude-100"
              >
                <div className="text-4xl mb-6 grayscale group-hover:grayscale-0 transition-all duration-500">{service.icon}</div>
                <h3 className="font-serif text-2xl mb-4 text-gray-800">{service.title}</h3>
                <p className="text-gray-500 font-light text-sm leading-relaxed mb-6">{service.desc}</p>
                <Link to="/services" className="text-nude-400 font-medium text-xs uppercase tracking-widest border-b border-transparent hover:border-nude-400 transition-all">
                  Learn More
                </Link>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Why Choose Us */}
      <section className="py-24 grid grid-cols-1 lg:grid-cols-2 items-center">
        <div className="relative h-[600px] overflow-hidden">
          <img 
            src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&q=80&w=1200" 
            className="w-full h-full object-cover"
            alt="Expert Care"
          />
        </div>
        <div className="p-12 lg:p-24 space-y-8">
          <span className="text-nude-400 font-medium tracking-widest uppercase text-sm">Our Philosophy</span>
          <h2 className="font-serif text-4xl md:text-5xl leading-tight">Elevating Standards in Modern Aesthetics</h2>
          <div className="space-y-6">
            <div className="flex gap-6">
              <div className="w-12 h-12 rounded-full bg-nude-100 flex items-center justify-center flex-shrink-0 text-nude-500">✓</div>
              <div>
                <h4 className="font-medium text-lg mb-2">Clinical Precision</h4>
                <p className="text-gray-500 font-light text-sm">Hospital-grade hygiene protocols for your safety and peace of mind.</p>
              </div>
            </div>
            <div className="flex gap-6">
              <div className="w-12 h-12 rounded-full bg-nude-100 flex items-center justify-center flex-shrink-0 text-nude-500">✓</div>
              <div>
                <h4 className="font-medium text-lg mb-2">Award-Winning Experts</h4>
                <p className="text-gray-500 font-light text-sm">Certified specialists with years of international experience.</p>
              </div>
            </div>
            <div className="flex gap-6">
              <div className="w-12 h-12 rounded-full bg-nude-100 flex items-center justify-center flex-shrink-0 text-nude-500">✓</div>
              <div>
                <h4 className="font-medium text-lg mb-2">Premium Products</h4>
                <p className="text-gray-500 font-light text-sm">We use only the world's most exclusive, organic-certified brands.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Testimonials */}
      <section className="py-24 bg-nude-100">
        <div className="max-w-5xl mx-auto px-4 text-center">
          <h2 className="font-serif text-4xl mb-16 italic">Loved by our Clients</h2>
          <div className="grid md:grid-cols-2 gap-12">
            {testimonials.map((t, i) => (
              <div key={i} className="space-y-6">
                <p className="text-xl md:text-2xl font-serif leading-relaxed text-gray-700">"{t.text}"</p>
                <div>
                  <div className="font-medium tracking-widest uppercase text-xs text-nude-400">{t.name}</div>
                  <div className="text-xs text-gray-400 mt-1">Verified Client</div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Instagram Preview */}
      <section className="py-24">
        <div className="max-w-7xl mx-auto px-4 text-center">
           <span className="text-nude-400 font-medium tracking-widest uppercase text-xs mb-4 block">Follow us @lumiere_beauty</span>
           <h2 className="font-serif text-4xl mb-12">Capture the Glow</h2>
           <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
              {[1, 2, 3, 4].map(i => (
                <div key={i} className="aspect-square overflow-hidden group cursor-pointer">
                   <img 
                    src={`https://picsum.photos/600/600?random=${i + 10}`} 
                    className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                    alt="Instagram post" 
                   />
                </div>
              ))}
           </div>
           <a href="#" className="inline-block mt-12 bg-white border border-nude-300 px-8 py-3 rounded-full text-sm tracking-widest hover:bg-nude-100 transition-colors">JOIN OUR COMMUNITY</a>
        </div>
      </section>
    </div>
  );
};

export default Home;
