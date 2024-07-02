// src/api.ts
import axios from 'axios';

const API_URL = 'http://localhost:8000/api';

interface Image {
  id: number;
  title: string;
  image_path: string;
}

const getImageList = async (): Promise<Image[]> => {
  try {
    const response = await axios.get<Image[]>(`${API_URL}/images`);
    return response.data;
  } catch (error) {
    console.error('Error fetching images:', error);
    throw error;
  }
};

const createImage = async (formData: FormData): Promise<void> => {
  try {
    await axios.post(`${API_URL}/images`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  } catch (error) {
    console.error('Error creating image:', error);
    throw error;
  }
};

const updateImage = async (id: number, formData: FormData): Promise<void> => {
  try {
    await axios.put(`${API_URL}/images/${id}`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  } catch (error) {
    console.error('Error updating image:', error);
    throw error;
  }
};

const deleteImage = async (id: number): Promise<void> => {
  try {
    await axios.delete(`${API_URL}/images/${id}`);
  } catch (error) {
    console.error('Error deleting image:', error);
    throw error;
  }
};

export {
  getImageList,
  createImage,
  updateImage,
  deleteImage
};
