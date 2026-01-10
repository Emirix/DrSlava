
export interface Service {
  id: string;
  title: string;
  description: string;
  price: string;
  image: string;
  category: string;
}

export interface Branch {
  id: string;
  name: string;
  address: string;
  phone: string;
  mapUrl: string;
  hours: string;
}

export interface Review {
  id: string;
  name: string;
  content: string;
  rating: number;
  avatar: string;
}
