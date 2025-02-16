import React from 'react';
import { StyleSheet, View, Image, Text, TouchableOpacity, ScrollView, Dimensions } from 'react-native';
import { LinearGradient } from 'expo-linear-gradient';
import { useNavigation } from '@react-navigation/native';

const { width } = Dimensions.get('window');  // Obtener el ancho de la pantalla

function Administration() {
  const navigation = useNavigation();

  const handlePress = (buttonName: string) => {
    console.log(`Presionaste: ${buttonName}`);
  };

  return (
    <LinearGradient colors={['#066fc7', '#ffffff']} style={styles.background}>
      <ScrollView contentContainerStyle={styles.container}>
        <Image source={require('@/assets/images/Logo.jpg')} style={styles.image} />
        <Text style={styles.title}>Administración</Text>

        <View style={styles.buttonRow}>
          <TouchableOpacity style={styles.mainButton} onPress={() => navigation.navigate("IntensiveCarePatients")}>
            <Text style={styles.buttonText}>Pacientes en{'\n'}Cuidados Intensivos</Text>
          </TouchableOpacity>
          <TouchableOpacity style={styles.mainButton} onPress={() => navigation.navigate("IntermediateCarePatients")}>
            <Text style={styles.buttonText}>Pacientes en{'\n'}Cuidados Intermedios</Text>
          </TouchableOpacity>
          <TouchableOpacity style={styles.mainButton} onPress={() => navigation.navigate("ObservationPatients")}>
            <Text style={styles.buttonText}>Pacientes en{'\n'}Observación</Text>
          </TouchableOpacity>
        
        </View>

        <View style={styles.buttonRow}>
          <TouchableOpacity style={styles.mainButton} onPress={() => navigation.navigate("Monitoring")}>
            <Text style={styles.buttonText}>Monitoreo</Text>
          </TouchableOpacity>
          <TouchableOpacity style={styles.mainButton} onPress={() => handlePress('Edición')}>
            <Text style={styles.buttonText}>Edición</Text>
          </TouchableOpacity>
          
          <TouchableOpacity style={styles.mainButton} onPress={() => navigation.navigate("HomeScreen")}>
            <Text style={styles.buttonText}>Regresar</Text>
          </TouchableOpacity>
        </View>

        <Text style={styles.footerText}>Hoja de Vida. Todos los derechos reservados</Text>
      </ScrollView>
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
    paddingVertical: 20,
  },
  image: {
    width: 200,
    height: 200,
    borderRadius: 25,
    marginBottom: 16,
    marginTop: 27,
  },
  title: {
    fontSize: 50,
    fontWeight: 'bold',
    color: '#ffffff',
    marginBottom: 24,
    textAlign: 'center',
  },
  buttonRow: {
    flexDirection: 'row',
    flexWrap: 'wrap',
    justifyContent: 'center',
    marginBottom: 20,
  },
  mainButton: {
    backgroundColor: '#ffffff',
    paddingVertical: 15,
    paddingHorizontal:15,  // Botones adaptables al tamaño de pantalla
    borderRadius: 15,
    margin: 10,
    alignItems: 'center',
    justifyContent: 'center',
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.2,
    shadowRadius: 4,
    elevation: 3,
  },
  buttonText: {
    fontSize: 21,
    color: '#003366',
    fontWeight: '600',
    textAlign: 'center',
  },
  footerText: {
    fontSize: 20,
    color: '#black',
    marginTop: 20,
    fontWeight: '600',
  },
});

export default Administration;
