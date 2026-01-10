
import React from 'react';

const WhatsAppButton: React.FC = () => {
  return (
    <a
      href="https://wa.me/1234567890"
      target="_blank"
      rel="noopener noreferrer"
      className="fixed bottom-8 right-8 z-40 bg-white luxury-shadow p-4 rounded-full group hover:bg-nude-50 transition-all duration-300 transform hover:-translate-y-2 flex items-center gap-2"
    >
      <div className="w-6 h-6 text-green-500">
        <svg fill="currentColor" viewBox="0 0 24 24">
          <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.767 5.767 0 1.267.408 2.445 1.103 3.407l-.722 2.637 2.7-.71c.927.615 2.035.973 3.226.973 3.181 0 5.767-2.587 5.767-5.768 0-3.181-2.586-5.766-5.767-5.766zm3.449 8.212c-.139.39-.706.711-1.011.756-.279.04-.633.063-1.026-.063-.243-.078-.549-.181-.926-.346-1.597-.694-2.632-2.315-2.712-2.42-.08-.105-.644-.858-.644-1.637 0-.779.403-1.162.547-1.32.145-.158.322-.198.427-.198.105 0 .21.001.302.006.096.004.225-.036.353.272.132.316.452 1.1.492 1.18.04.081.066.175.012.282-.054.107-.08.185-.16.279-.08.094-.167.21-.239.281-.081.08-.166.167-.07.331.096.164.428.706.919 1.144.63.562 1.161.737 1.325.821.164.083.259.069.356-.042.096-.111.414-.482.525-.647.111-.164.222-.138.375-.08.153.058.966.456 1.133.539.167.083.278.125.32.193.04.068.04.394-.1.784z"/>
        </svg>
      </div>
      <span className="max-w-0 overflow-hidden group-hover:max-w-xs transition-all duration-500 whitespace-nowrap text-sm font-medium tracking-tight pr-2">
        Chat with us
      </span>
    </a>
  );
};

export default WhatsAppButton;
