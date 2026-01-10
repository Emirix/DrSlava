
import React, { useState } from 'react';
import { Service } from '../types';

const Services: React.FC = () => {
  const [activeCategory, setActiveCategory] = useState('All');
  
  const categories = ['All', 'Hair', 'Facials', 'Spa', 'Nails'];
  
  const services: Service[] = [
    { id: '1', title: 'Hydra-Silk Facial', description: 'Deep hydration treatment using premium volcanic minerals and silk proteins.', price: '$120', category: 'Facials', image: 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&q=80&w=800' },
    { id: '2', title: 'Balayage Artistry', description: 'Sun-kissed highlights meticulously hand-painted by our master colorists.', price: 'From $250', category: 'Hair', image: 'https://images.unsplash.com/photo-1560869713-7d0a294308d3?auto=format&fit=crop&q=80&w=800' },
    { id: '3', title: 'Gel Sculpting', description: 'Long-lasting nail enhancements with bespoke artistic patterns.', price: '$85', category: 'Nails', image: 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&q=80&w=800' },
    { id: '4', title: 'Deep Tissue Flow', description: 'A restorative massage technique targeting specific muscle tension.', price: '$150', category: 'Spa', image: 'https://images.unsplash.com/photo-1519823551278-64ac92734fb1?auto=format&fit=crop&q=80&w=800' },
    { id: '5', title: 'Anti-Aging Ritual', description: 'Harnessing micro-current technology to lift and tone facial contours.', price: '$180', category: 'Facials', image: 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&q=80&w=800' },
    { id: '6', title: 'Glass Hair Treatment', description: 'Achieve mirror-like shine and ultimate frizz control with our signature glaze.', price: '$95', category: 'Hair', image: 'https://images.unsplash.com/photo-1522337660859-02fbefca4702?auto=format&fit=crop&q=80&w=800' },
  ];

  const filteredServices = activeCategory === 'All' 
    ? services 
    : services.filter(s => s.category === activeCategory);

  return (
    <div className="bg-nude-50 min-h-screen py-20 px-4">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-16 animate-slide-up">
          <h1 className="font-serif text-5xl md:text-6xl mb-6">Our Services</h1>
          <p className="text-gray-500 font-light text-lg max-w-2xl mx-auto">
            Discover a curated menu of treatments tailored to your individual needs.
          </p>
        </div>

        {/* Categories */}
        <div className="flex flex-wrap justify-center gap-4 mb-16">
          {categories.map(cat => (
            <button
              key={cat}
              onClick={() => setActiveCategory(cat)}
              className={`px-8 py-2 rounded-full text-sm tracking-widest transition-all ${
                activeCategory === cat 
                  ? 'bg-nude-400 text-white shadow-md' 
                  : 'bg-white text-gray-400 hover:text-nude-500 border border-nude-200'
              }`}
            >
              {cat.toUpperCase()}
            </button>
          ))}
        </div>

        {/* Service Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
          {filteredServices.map(service => (
            <div 
              key={service.id} 
              className="bg-white rounded-3xl overflow-hidden group luxury-shadow hover:-translate-y-2 transition-all duration-500 animate-fade-in"
            >
              <div className="h-64 overflow-hidden relative">
                <img 
                  src={service.image} 
                  alt={service.title} 
                  className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                <div className="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-1 rounded-full text-xs font-medium tracking-wider text-nude-500">
                  {service.price}
                </div>
              </div>
              <div className="p-8 space-y-4">
                <span className="text-[10px] uppercase tracking-[0.2em] text-nude-400 font-semibold">{service.category}</span>
                <h3 className="font-serif text-2xl text-gray-800">{service.title}</h3>
                <p className="text-gray-500 font-light text-sm leading-relaxed">
                  {service.description}
                </p>
                <button className="w-full py-4 border border-nude-200 rounded-2xl text-sm font-medium hover:bg-nude-400 hover:text-white hover:border-nude-400 transition-all duration-300">
                  Book This Service
                </button>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Services;
