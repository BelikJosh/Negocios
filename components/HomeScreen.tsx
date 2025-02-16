import React, { useState } from 'react';
import { StyleSheet, View, Image, Text, TouchableOpacity, ScrollView, Modal } from 'react-native';
import { LinearGradient } from 'expo-linear-gradient';
import { useNavigation } from '@react-navigation/native';
import 'react-native-gesture-handler';

function HomeScreen() {
  const navigation = useNavigation();
  const [modalVisible, setModalVisible] = useState({ mission: false, vision: false, about: false, terms: false, privacy: false });

  const toggleModal = (type: string, isVisible: boolean) => {
    setModalVisible(prev => ({ ...prev, [type]: isVisible }));
  };

  return (
    <LinearGradient colors={['#066fc7', '#ffffff']} style={styles.background}>
      <ScrollView contentContainerStyle={styles.container}>
        <Image source={require('@/assets/images/Logo.jpg')} style={styles.image} />
        <Text style={styles.title}>Hoja de Vida</Text>

        <TouchableOpacity 
          style={styles.mainButton} 
          onPress={() => navigation.navigate('Administration')}
        >
          <Text style={styles.buttonText}>Acceder</Text>
        </TouchableOpacity>

        <View style={styles.footerButtonsContainer}>
          <TouchableOpacity style={styles.footerButton} onPress={() => toggleModal('mission', true)}>
            <Text style={styles.footerButtonText}>Misión de empresa</Text>
          </TouchableOpacity>
          
          <TouchableOpacity style={styles.footerButton} onPress={() => toggleModal('vision', true)}>
            <Text style={styles.footerButtonText}>Visión de empresa</Text>
          </TouchableOpacity>
          
          <TouchableOpacity style={styles.footerButton} onPress={() => toggleModal('about', true)}>
            <Text style={styles.footerButtonText}>Nosotros</Text>
          </TouchableOpacity>

          <TouchableOpacity style={styles.footerButton} onPress={() => toggleModal('terms', true)}>
            <Text style={styles.footerButtonText}>Términos y Condiciones</Text>
          </TouchableOpacity>

          <TouchableOpacity style={styles.footerButton} onPress={() => toggleModal('privacy', true)}>
            <Text style={styles.footerButtonText}>Política de Privacidad</Text>
          </TouchableOpacity>
        </View>

        <Text style={styles.footerText}>Hoja de Vida. Todos los derechos reservados</Text>
      </ScrollView>

      {/* Modales Independientes */}
      {Object.entries({
        mission: "Nuestra misión es optimizar la gestión hospitalaria a través de soluciones digitales innovadoras que mejoren la calidad de la atención médica, reduciendo costos operativos y mejorando la experiencia tanto de pacientes como de profesionales de la salud. Desarrollamos software especializado para hospitales del sector privado y social, que integra herramientas avanzadas como aplicaciones móviles, sensores biomédicos y almacenamiento seguro de datos, para garantizar la eficiencia, seguridad y accesibilidad en los procesos médicos. Nos dedicamos a proporcionar soluciones que simplifiquen los registros, mejoren el monitoreo y faciliten la toma de decisiones médicas, transformando la forma en que los hospitales gestionan la atención y asegurando la protección de los datos de los pacientes",
        vision: "Nuestra visión es mostrar nuestras habilidades en digitalización en el sector salud para revolucionar la gestión hospitalaria con soluciones tecnológicas innovadoras que transformen la atención médica. Aspiramos a ayudar a este importante sector en la sociedad con la integración de tecnología de vanguardia, mejorando la experiencia de pacientes y profesionales de la salud, garantizando eficiencia, seguridad y accesibilidad. Nos proyectamos como aliados estratégicos de hospitales y clínicas, trabajando continuamente para adoptar las últimas innovaciones en análisis de datos y desarrollo de aplicaciones digitales, contribuyendo a un futuro más innovador y eficiente para todos.",
        about: "Información sobre nosotros...",
        terms: "Términos y condiciones...",
        privacy: "Política de privacidad..."
      }).map(([key, content]) => (
        <Modal
          key={key}
          animationType="slide"
          transparent={true}
          visible={modalVisible[key]}
          onRequestClose={() => toggleModal(key, false)}
        >
          <View style={styles.modalContainer}>
            <View style={styles.modalContent}>
              <Text style={styles.modalTitle}>{key.charAt(0).toUpperCase() + key.slice(1)}</Text>
              <ScrollView>
                <Text style={styles.modalText}>{content}</Text>
              </ScrollView>
              <TouchableOpacity style={styles.modalButton} onPress={() => toggleModal(key, false)}>
                <Text style={styles.modalButtonText}>Cerrar</Text>
              </TouchableOpacity>
            </View>
          </View>
        </Modal>
      ))}
    </LinearGradient>
  );
}

const styles = StyleSheet.create({
  background: {
    flex: 1,
  },
  container: {
    justifyContent: 'center',
    alignItems: 'center',
    paddingVertical: 50,
  },
  image: {
    width: 200,
    height: 200,
    borderRadius: 25,
    marginBottom: 16,
  },
  title: {
    fontSize: 50,
    fontWeight: 'bold',
    color: '#ffffff',
    marginBottom: 0,
  },
  mainButton: {
    backgroundColor: '#ffffff',
    paddingVertical: 12,
    paddingHorizontal: 70,
    borderRadius: 25,
    marginBottom: 50,
    marginTop: 50,
    borderWidth: 1,
    borderColor: '#f0f4f6',
  },
  buttonText: {
    fontSize: 25,
    color: '#000',
    fontWeight: '600',
    padding: 10,
  },
  footerButtonsContainer: {
    flexDirection: 'row',
    flexWrap: 'wrap',
    justifyContent: 'center',
    marginBottom: 24,
    alignContent: 'center',
    alignItems: 'center',
  },
  footerButton: {
    backgroundColor: '#d0d5d7',
    paddingVertical: 8,
    paddingHorizontal: 50,
    borderRadius: 15,
    margin: 5,
  },
  footerButtonText: {
    fontSize: 15,
    color: '#000',
  },
  footerText: {
    fontSize: 20,
    color: 'black',
    marginTop: 20,
    fontWeight: '600',
  },
  modalContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: 'rgba(0, 0, 0, 0.5)',
  },
  modalContent: {
    backgroundColor: '#fff',
    padding: 20,
    borderRadius: 10,
    alignItems: 'center',
    width: '80%',
  },
  modalTitle: {
    fontSize: 22,
    fontWeight: 'bold',
    marginBottom: 10,
    textAlign: 'center',
  },
  modalText: {
    fontSize: 18,
    marginBottom: 15,
    textAlign: 'center',
  },
  modalButton: {
    backgroundColor: '#066fc7',
    padding: 10,
    borderRadius: 8,
    marginTop: 10,
  },
  modalButtonText: {
    color: '#fff',
    fontSize: 16,
    fontWeight: 'bold',
  },
});

export default HomeScreen;
