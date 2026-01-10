
import React from 'react';
import { Branch } from '../types';

const Branches: React.FC = () => {
  const branches: Branch[] = [
    {
      id: '1',
      name: 'Downtown Sanctuary',
      address: '123 Aesthetic Plaza, Suite 400, NY 10001',
      phone: '+1 (555) 123-4567',
      hours: 'Mon-Sat: 9am - 8pm, Sun: 10am - 6pm',
      mapUrl: 'https://maps.google.com/maps?q=downtown+manhattan&t=&z=13&ie=UTF8&iwloc=&output=embed'
    },
    {
      id: '2',
      name: 'Westside Boutique',
      address: '789 Wellness Way, West End, CA 90210',
      phone: '+1 (555) 987-6543',
      hours: 'Tue-Sat: 10am - 9pm, Mon/Sun: Closed',
      mapUrl: 'https://maps.google.com/maps?q=beverly+hills&t=&z=13&ie=UTF8&iwloc=&output=embed'
    }
  ];

  return (
    <div className="bg-nude-50 py-24 px-4">
      <div className="max-w-6xl mx-auto">
        <div className="text-center mb-20 animate-slide-up">
          <h1 className="font-serif text-5xl mb-6">Our Locations</h1>
          <p className="text-gray-500 font-light">Find your nearest Lumière oasis.</p>
        </div>

        <div className="space-y-24">
          {branches.map((branch, idx) => (
            <div key={branch.id} className={`flex flex-col ${idx % 2 === 0 ? 'lg:flex-row' : 'lg:flex-row-reverse'} gap-12 items-center animate-fade-in`}>
              <div className="w-full lg:w-1/2 space-y-8">
                <div className="bg-white p-10 rounded-3xl luxury-shadow border border-nude-100">
                  <h2 className="font-serif text-3xl mb-6 text-gray-800">{branch.name}</h2>
                  <div className="space-y-6">
                    <div className="flex items-start gap-4">
                      <div className="text-nude-400 mt-1">📍</div>
                      <p className="text-gray-600 font-light leading-relaxed">{branch.address}</p>
                    </div>
                    <div className="flex items-start gap-4">
                      <div className="text-nude-400 mt-1">📞</div>
                      <p className="text-gray-600 font-light">{branch.phone}</p>
                    </div>
                    <div className="flex items-start gap-4">
                      <div className="text-nude-400 mt-1">⏰</div>
                      <p className="text-gray-600 font-light">{branch.hours}</p>
                    </div>
                  </div>
                  <div className="pt-10 flex gap-4">
                    <button className="bg-nude-400 text-white px-8 py-3 rounded-full text-sm font-medium hover:bg-nude-500 transition-all flex-1">
                      Call Now
                    </button>
                    <button className="border border-nude-200 text-gray-500 px-8 py-3 rounded-full text-sm font-medium hover:bg-nude-50 transition-all flex-1">
                      Get Directions
                    </button>
                  </div>
                </div>
              </div>
              <div className="w-full lg:w-1/2 h-[400px] rounded-3xl overflow-hidden luxury-shadow border-4 border-white">
                <iframe
                  title={branch.name}
                  src={branch.mapUrl}
                  width="100%"
                  height="100%"
                  style={{ border: 0, filter: 'grayscale(0.4) contrast(1.1) brightness(1.1)' }}
                  allowFullScreen
                  loading="lazy"
                ></iframe>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Branches;
