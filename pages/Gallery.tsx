
import React from 'react';

const Gallery: React.FC = () => {
  const images = [
    { src: 'https://images.unsplash.com/photo-1560750588-73207b1ef5b8?auto=format&fit=crop&q=80&w=1200', title: 'Our Sanctuary' },
    { src: 'https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&q=80&w=800', title: 'Expert Styling' },
    { src: 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&q=80&w=800', title: 'Skincare Perfection' },
    { src: 'https://images.unsplash.com/photo-1600948836101-f9ffda59d250?auto=format&fit=crop&q=80&w=800', title: 'Consultation Area' },
    { src: 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&q=80&w=800', title: 'Luxury Detail' },
    { src: 'https://images.unsplash.com/photo-1519823551278-64ac92734fb1?auto=format&fit=crop&q=80&w=800', title: 'Therapy Room' },
    { src: 'https://images.unsplash.com/photo-1527799822367-3d8d2703f990?auto=format&fit=crop&q=80&w=1200', title: 'Product Display' },
    { src: 'https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?auto=format&fit=crop&q=80&w=800', title: 'Nail Lounge' },
  ];

  return (
    <div className="bg-nude-50 py-24 px-4">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-16 animate-slide-up">
           <span className="text-nude-400 font-medium tracking-widest uppercase text-xs mb-4 block">Immerse Yourself</span>
           <h1 className="font-serif text-5xl mb-6">Our Sanctuary</h1>
           <p className="text-gray-500 font-light max-w-xl mx-auto italic">Step inside and breathe. Every detail of Lumière is designed for your comfort and serenity.</p>
        </div>

        <div className="masonry-grid">
          {images.map((img, i) => (
            <div key={i} className="masonry-item group relative overflow-hidden rounded-2xl cursor-pointer bg-white border border-nude-100 luxury-shadow animate-fade-in">
              <img 
                src={img.src} 
                alt={img.title} 
                className="w-full h-auto transition-transform duration-1000 group-hover:scale-105"
              />
              <div className="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                <p className="text-white font-serif text-xl tracking-wide translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                  {img.title}
                </p>
              </div>
            </div>
          ))}
        </div>
        
        <div className="mt-20 text-center">
           <button className="bg-white border border-nude-300 text-nude-500 px-12 py-4 rounded-full text-sm tracking-[0.2em] font-medium hover:bg-nude-100 transition-all luxury-shadow">
             LOAD MORE MOMENTS
           </button>
        </div>
      </div>
    </div>
  );
};

export default Gallery;
