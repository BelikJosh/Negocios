import Administration from '@/components/Administration';
import HomeScreen from '@/components/HomeScreen';
import IntensiveCarePatients from '@/components/IntensiveCarePatients';
import IntermediateCarePatients from '@/components/IntermediateCarePatients';
import Monitoring from '@/components/Monitoring';
import ObservationPatients from '@/components/ObservationPatients';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

const Stack = createNativeStackNavigator();

function Inicio() {
  return (
    <Stack.Navigator screenOptions={{ headerShown: false }}>
      <Stack.Screen name="HomeScreen" component={HomeScreen} />
      <Stack.Screen name="Administration" component={Administration} />
      <Stack.Screen name="IntensiveCarePatients" component={IntensiveCarePatients} />
      <Stack.Screen name="IntermediateCarePatients" component={IntermediateCarePatients} />
      <Stack.Screen name="ObservationPatients" component={ObservationPatients} />
      <Stack.Screen name="Monitoring" component={Monitoring} />
    </Stack.Navigator>
  );
}

export default Inicio;
